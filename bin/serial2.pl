#!/usr/bin/perl

use warnings;
use strict;

use Device::SerialPort;
use Time::HiRes 'usleep';

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

#
# apparently this lists the options used by the serial device.
# is this really necessary?
#
for ($RFID->handshake) {
    print $_, "\n";
}

#
# five points if you actually know what this idiom does
#
#    select((select($logfile), $| = 1)[0]);
#

while (1) {
    # force byte semantics inside the loop
    use bytes;

    # COLON HEX-DIGITS*10 NEWLINE SEMICOLON NEWLINE
    # == 1 + 10 + 1 + 1 + 1 = 14 ASCII byte
    my ($count, $buffer) = $RFID->read(14);

    if ($count != 14) {
        #warn "Incomplete read\n";
        next;
    }

    # this is where the magic happens: //s is a single-line match; the '.' will match a newline
    # though you may just want to use the regex /([0-9a-f]+)/i and find the tag yourself
    if ($buffer =~ /^:([0-9A-Fa-f]+).;[\r\n]/s) {
        my $tag = $1;

        print '>>> TAG = ', $tag, "\n";
    } else {
        warn "Couldn't find tag in buffer:\n", $buffer, "\n";
    }

    usleep 125_000;
}