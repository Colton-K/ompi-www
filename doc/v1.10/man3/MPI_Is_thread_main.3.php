<?php
$topdir = "../../..";
$title = "MPI_Is_thread_main(3) man page (version 1.10.0)";
$meta_desc = "Open MPI v1.10.0 man page: MPI_IS_THREAD_MAIN(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<p>
<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Is_thread_main</b> - Determines if thread called <a href="../man3/MPI_Init.3.php">MPI_Init</a>
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C
Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Is_thread_main(int *flag)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_IS_THREAD_MAIN(FLAG, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;LOGICAL<tt> </tt>&nbsp;<tt> </tt>&nbsp;FLAG
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
bool MPI::Is_thread_main()
</pre>
<h2><a name='sect5' href='#toc5'>Output Parameters</a></h2>

<dl>

<dt>flag </dt>
<dd>True if calling thread is main thread (boolean). </dd>

<dt>IERROR
</dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
MPI_Is_thread_main is
called by a thread to find out whether the caller is the main thread (that
is, the thread that called <a href="../man3/MPI_Init.3.php">MPI_Init</a> or <a href="../man3/MPI_Init_thread.3.php">MPI_Init_thread</a>).
<p>
<h2><a name='sect7' href='#toc7'>Errors</a></h2>
Almost all
MPI routines return an error value; C routines as the value of the function
and Fortran routines in the last argument. C++ functions do not return errors.
If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then
on error the C++ exception mechanism will be used to throw an MPI::Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.  <p>
See the MPI man page for a full list of MPI
error codes.
<p>
<h2><a name='sect8' href='#toc8'>See Also</a></h2>
<br>
<pre><a href="../man3/MPI_Init.3.php">MPI_Init</a>
<a href="../man3/MPI_Init_thread.3.php">MPI_Init_thread</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
