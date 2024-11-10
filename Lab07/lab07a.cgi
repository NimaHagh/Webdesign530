#!/usr/bin/perl -wT
use CGI ':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);

print "Content-type: text/html\n\n";

print <<"HTML";
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab07 Part 1</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Edu AU VIC WA NT Pre", cursive;
            font-optical-sizing: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .center-text {
            font-size: 5em;
            color: #A020F0; 
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="center-text">This is my first Perl program</div>
</body>
</html>
HTML
