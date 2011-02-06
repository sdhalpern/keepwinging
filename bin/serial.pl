#!/usr/bin/perl
#

use warnings;
use strict;
use Device::SerialPort;
use Time::HiRes;


my $DEBUG=1;
my $DELAY=30; #secs
my $READ_DELAY=125000; #microsecs

open( LOG, ">","/Users/kyle/logfile" );
my $DEV="/dev/tty.usbserial-A600aib2";
my $RFID = Device::SerialPort->new("$DEV")
	|| die ("Can't open $DEV: $!");

$RFID->baudrate(2400);
#$RFID->pulse_dtr_on(500);
#$RFID->debug(1);

my $PortObj = $RFID;

my @handshake_opts=$RFID->handshake;

foreach (@handshake_opts) {
	print $_ . "\n";
}


select((select(LOG), $| = 1)[0]);

my $lastTime = my $lastTag = "";

sub GrahamCommand($$) {
	my $tag = $_[0];
	my $command = $_[1];
	if ( $command eq "Y" ) {
		system("./symfony tag:reportRemote $tag");
		print "\n\n\nsay $tag\n\n\n" unless ($DEBUG == 0);
	} elsif ($command eq "R" ) {
		# system("say \"$tag is a repeat\"&");
		print "\n\n\nsay $tag is a repeat\n\n\n" unless ($DEBUG == 0);
	}
}

sub sanitize($) {
	my $tag = $_[0];
	my $time = `date +%s`;
	if ( $tag eq $lastTag ) {
		if ( ($time - $lastTime) > $DELAY ) {
			GrahamCommand($tag,"Y");
			print "\n\n\n eq; Y\n\n\n" unless ($DEBUG==0);
			$lastTime = $time;
		} else {
			GrahamCommand($tag,"R");
			print "\n\n\n eq; R\n\n\n" unless ($DEBUG==0);
		}
	} else {
		GrahamCommand($tag,"Y");
		print "\n\n\n neq; Y\n\n\n" unless ($DEBUG==0);
		$lastTime = $time;
	}
	$lastTag = $tag;
}
			
	

my $partial = "";
my $READ = 0;
while (1) {
my @read = $RFID->read(11);
chomp($read[1]);
print "read: $read[1] partial: $partial\n" unless($DEBUG == 0);
if ($read[1] =~ m/^:(\S*+)/ and $READ == 0) {
	$READ=1;
	$partial = $1;
	if (length($partial) == 10 ) {
		print "FINAL: $partial\n";
		sanitize($partial);
#print LOG "$partial\n";
		$READ=0;
		$partial = "";
	}
} elsif ($READ == 1 ) {
	if ( $read[1] =~ m/(\S*+);/ ) {
		$partial .= $1;
		print "FINAL: $partial\n";
		sanitize($partial);
#print LOG "$partial\n";
		$READ=0;
		$partial = "";
	}
	elsif ( $read[1] =~ m/(\S*+)/ ) {
		$partial .= $1;
		if ( length($partial) == 10 ) {
			print "FINAL: $partial\n";
			sanitize($partial);
#print LOG "$partial\n";
			$READ = 0;
			$partial = "";
		}
	}
}
	
Time::HiRes::usleep($READ_DELAY);
}
