<?php
$topdir = "../../..";
$title = "MPI_Send(3) man page (version 1.10.0)";
$meta_desc = "Open MPI v1.10.0 man page: MPI_SEND(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Send</b> - Performs a standard-mode blocking send.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Send(const void *buf, int count, MPI_Datatype datatype, int dest,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int tag, MPI_Comm comm)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_SEND(BUF, COUNT, DATATYPE, DEST, TAG, COMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;BUF(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, DATATYPE, DEST, TAG, COMM, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void Comm::Send(const void* buf, int count, const Datatype&amp;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;datatype, int dest, int tag) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>buf </dt>
<dd>Initial address of send buffer (choice). </dd>

<dt>count </dt>
<dd>Number
of elements send (nonnegative integer). </dd>

<dt>datatype </dt>
<dd>Datatype of each send buffer
element (handle). </dd>

<dt>dest </dt>
<dd>Rank of destination (integer). </dd>

<dt>tag </dt>
<dd>Message tag (integer).
</dd>

<dt>comm </dt>
<dd>Communicator (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameter</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran only: Error
status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Send performs a standard-mode, blocking
send.
<p>
<h2><a name='sect8' href='#toc8'>Note</a></h2>
This routine will block until the message is sent to the destination.
For an in-depth explanation of the semantics of the standard-mode send, refer
to the MPI-1 Standard.
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return an error value;
C routines as the value of the function and Fortran routines in the last
argument. C++ functions do not return errors. If the default error handler
is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception
mechanism will be used to throw an MPI::Exception object. <p>
Before the error
value is returned, the current MPI error handler is called. By default,
this error handler aborts the MPI job, except for I/O function errors. The
error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined
error handler MPI_ERRORS_RETURN may be used to cause error values to be
returned. Note that MPI does not guarantee that an MPI program can continue
past an error.
<p>
<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<br>
<pre><a href="../man3/MPI_Isend.3.php">MPI_Isend</a>
<a href="../man3/MPI_Bsend.3.php">MPI_Bsend</a>
<a href="../man3/MPI_Recv.3.php">MPI_Recv</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
