#!/usr/bin/perl

use warnings;
use strict;

use FindBin '$Bin';
use Device::SerialPort;
use Time::HiRes 'usleep';

my $SYMFONY = "$Bin/../symfony";

#
# There was a log file opened here, but it wasn ever used.
# I have included the proper (i.e., post-perl 5.8) way.
#
#    use File::Spec::Functions 'catfile';
#    use constant LOGFILE_PATH => catfile($ENV{HOME}, 'logfile');
#    open my $logfile, '>', LOGFILE_PATH or die "Couldn't open log file: $!\n";
#

use constant DEVICE_PATH  => '/dev/tty.usbserial-A600aib2';

# 
# open RFID device; set baud rate
#

my $RFID = Device::SerialPort->new(DEVICE_PATH)
    or die 'Couldn\'t open serial device ', DEVICE_PATH, ': ', $!, "\n";
$RFID->baudrate(2400);

$RFID->are_match("\n");

my $start = time;
my $last_tag = undef;

while (1) {
    my $buf = "";

    until ($buf ne "") {
        $buf = $RFID->lookfor;

	die "Aborted without match\n" unless defined $buf;
        usleep 500_000;
    }

    print "Found ", $buf, " [", length $buf, "]\n";

    if ($buf =~ /([0-9a-f]+)/i) {
        my $tag = $1;
        print "Tag is ", $tag, "\n";

        if (not defined $last_tag) {
            # first check-in
            $last_tag = $tag;
        } else {
            if ($tag eq $last_tag) {
                # prevent double check-ins
                if (time - $start > 30) {
                    system $SYMFONY, 'tag:reportRemote', $tag;
                    $start = time;
                }
            } else {
                $start = time;
                system $SYMFONY, 'tag:reportRemote', $tag;
                $last_tag = $tag;
            }
        }
    }

    usleep 125_000;
}
