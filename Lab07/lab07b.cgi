#!/usr/bin/perl -wT
use CGI ':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);

print "Content-type: text/html\n\n";
print "<div style=\"color:DarkRed\">Lab07 - Problem 2</div>";

# Capture form data
my $full_name = param('full_name');
my $street = param('street');
my $postal = param('postal');
my $phone = param('phone');
my $email = param('email');
my $province = param('province');
my $photo = upload('photo');

# Initialize error messages This array stores any validation error messages. If there are errors, they’ll be displayed to the user later.
my @errors;

if ($phone !~ /^\d{10}$/) {
    push @errors, "Phone number must be 10 digits";
}

if ($postal !~ /^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/) {
    push @errors, "Postal code must be in format A1A 1A1";
}

if ($email !~ /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/) {
    push @errors, "Invalid email format";
}

if (@errors) {
    print <<"HTML";
    <html>
    <head>
        <title>INvalid inputes from the user!! </title>
    </head>
    <body>
        <div class="container">
            <h2 class="error">Error: Please fix the issues with you inpt and and re submit:</h2>
            <ul class="error">
HTML
    foreach my $error (@errors) {
        print "<li>$error</li>";
    }
    print <<"HTML";
            </ul>
            <a href="../lab07b.html">form Link</a>
        </div>
    </body>
    </html>
HTML
    exit;
}


print <<"HTML";
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submission Successful</title>
    
</head>
<body>
    <div class="container">
        <h2>Submission Successful</h2>
        <div class="info"><span class="label">Full Name:</span> $full_name</div>
        <div class="info"><span class="label">Address:</span> $street</div>
        <div class="info"><span class="label">Postal Code:</span> $postal</div>
        <div class="info"><span class="label">Phone Number:</span> $phone</div>
        <div class="info"><span class="label">Email Address:</span> $email</div>
        <div class="info"><span class="label">Province:</span> $province</div>
HTML

if ($photo) {
    my $filename = param('photo');
    print "<div class=\"info\"><span class=\"label\">Photo:</span> $filename uploaded successfully.</div>";
} else {
    print "<div class=\"info\"><span class=\"label\">Photo:</span> No photo uploaded.</div>";
}

print <<"HTML";
    </div>
</body>
</html>
HTML
