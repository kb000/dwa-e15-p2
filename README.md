# XKCD-type password generator
## Dynamic Web Applications: Harvard Fall 2016

Kevin Burek <kev[...]@g[...].com>
To be submitted DWA (CSCI-E15) [Project 2](http://dwa15.com/Projects.../P2) 2016-09-22.

This site is to be published at [http://p2.dwa-e15.kb0.org/](http://p2.dwa-e15.kb0.org/)

This site is demonstrated at https://[[youtu].[[be]]/[[TODO]]

## Site content
A quick and easy web form (index.php), allowing customization of a randomly generated passphrase.
The form is submitted using GET, so it's easy to tweak generation parameters in the URL.

The password is generated by the server-side component generator.php. All logic is isolated to This
code file, and results are propagated back to the view with global variables. Server-side parsing of
the $_REQUEST parameters is performed, and sensible defaults are used when values are incorrect or
out of bounds.

This site uses [bootstrap](http://getbootstrap.com/) and [jquery](http://jquery.com/).  The CSS is
all new, no templates were used.
