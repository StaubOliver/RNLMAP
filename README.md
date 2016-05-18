# Reading Nature's Library

Reading Nature's Library is a citizen science project where anyone can help Manchester Museum catalogue their fossil collection. Images of the fossils are viewed by members of the public who input the label data from the images to build a database of the collection.

Research work has been conducted using this application to test whether login pages help or hinder citizen science contribution rates.

_To Sign Up, or not to Sign Up? Maximizing Citizen Science Contribution Rates through Optional Registration_, [CHI 2016](http://chi2016.acm.org/).

[View the paper at ResearchGate »](https://www.researchgate.net/publication/291356235_To_Sign_Up_or_not_to_Sign_Up_Maximizing_Citizen_Science_Contribution_Rates_through_Optional_Registration)

The code is posted here to assist other researchers and citizen science projects in their work.

## Installation

1. Upload the code to a hosting account with PHP enabled
2. Create a MySQL database from sql/rnl.sql
3. Edit application/config/config.php, updating the base_url variable (localhost or domain name)
4. Edit application/config/database.php with the database details
5. Edit the paths and variables in public/index.php
6. Images are hosted externally using the cloud image hosting service [http://cloudinary.com/](cloudinary.com)

## License

The MIT License (MIT)

Copyright (c) 2015 Rob Dunne

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.