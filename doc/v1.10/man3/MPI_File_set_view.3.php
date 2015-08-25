<?php
$topdir = "../../..";
$title = "MPI_File_set_view(3) man page (version 1.10.0)";
$meta_desc = "Open MPI v1.10.0 man page: MPI_FILE_SET_VIEW(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_File_set_view</b> - Changes process&rsquo;s view of data in file (collective).

<h2><a name='sect1' href='#toc1'>Syntax</a></h2>
<br>
<pre>C Syntax
    #include &lt;mpi.h&gt;
    int MPI_File_set_view(MPI_File fh, MPI_Offset disp,
    <tt> </tt>&nbsp;<tt> </tt>&nbsp;      MPI_Datatype etype, MPI_Datatype filetype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;      const char *datarep, MPI_Info info)
</pre>
<h2><a name='sect2' href='#toc2'>Fortran Syntax (see FORTRAN 77 NOTES)</a></h2>
<br>
<pre>    INCLUDE &rsquo;mpif.h&rsquo;
    MPI_FILE_SET_VIEW(FH, DISP, ETYPE,
    <tt> </tt>&nbsp;<tt> </tt>&nbsp;       FILETYPE, DATAREP, INFO, IERROR)
    <tt> </tt>&nbsp;<tt> </tt>&nbsp; INTEGER FH, ETYPE, FILETYPE, INFO, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp; CHARACTER*(*) DATAREP
    <tt> </tt>&nbsp;<tt> </tt>&nbsp; INTEGER(KIND=MPI_OFFSET_KIND) DISP
</pre>
<h2><a name='sect3' href='#toc3'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::File::Set_view(MPI::Offset disp,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Datatype&amp; etype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Datatype&amp; filetype, const char* datarep,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Info&amp; info)
</pre>
<h2><a name='sect4' href='#toc4'>Input/Output Parameter</a></h2>

<dl>

<dt>fh </dt>
<dd>File handle (handle).
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>disp   </dt>
<dd>Displacement
(integer). </dd>

<dt>etype  </dt>
<dd>Elementary data type (handle).  </dd>

<dt>filetype </dt>
<dd>File type (handle).
See Restrictions, below. </dd>

<dt>datarep </dt>
<dd>Data representation (string).  </dd>

<dt>info </dt>
<dd>Info
object (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameter</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).

<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
The MPI_File_set_view routine changes the process&rsquo;s view of
the data in the file -- the beginning of the data accessible in the file
through that view is set to  <i>disp;</i> the type of data is set to  <i>etype;</i> and
the distribution of data to processes is set to  <i>filetype.</i> In addition,
MPI_File_set_view resets the independent file pointers and the shared file
pointer to zero. MPI_File_set_view is collective across the  <i>fh</i>;<i></i> all processes
in the group must pass identical values for  <i>datarep</i> and provide an <i>etype</i>
with an identical extent.  The values for <i>disp</i>,<i></i> <i>filetype</i>, and  <i>info</i> may
vary. It is erroneous to use the shared file pointer data-access routines
unless identical values for  <i>disp</i> and  <i>filetype</i> are also given. The data
types passed in  <i>etype</i> and  <i>filetype</i> must be committed. <p>
The  <i>disp</i> displacement
argument specifies the position (absolute offset in bytes from the beginning
of the file) where the view begins. <p>
The MPI_File_set_view interface allows
the user to pass a data-representation string to MPI I/O via the <i>datarep</i>
argument. To obtain the default value (or "native"), pass NULL. The user
can also pass information via the <i>info</i> argument. See the HINTS section for
a list of hints that can be set. For more information, see the MPI-2 standard.

<p>
<h2><a name='sect8' href='#toc8'>Hints</a></h2>
The following hints can be used as values for the <i>info</i> argument.
 <p>
SETTABLE HINTS: <p>
- MPI_INFO_NULL <p>
- shared_file_timeout: Amount of time (in
seconds) to wait for access to the  shared file pointer before exiting
with MPI_ERR_TIMEDOUT. <p>
- rwlock_timeout: Amount of time (in seconds) to wait
for obtaining a read or  write lock on a contiguous chunk of a UNIX file
before exiting with MPI_ERR_TIMEDOUT. <p>
- noncoll_read_bufsize:  Maximum size
of the buffer used by MPI I/O to satisfy read requests in the noncollective
data-access routines. (See NOTE, below.) <p>
- noncoll_write_bufsize: Maximum size
of the buffer used by MPI I/O to satisfy write requests in the noncollective
data-access routines. (See NOTE, below.) <p>
- coll_read_bufsize:  Maximum size
of the buffer used by MPI I/O to satisfy read requests in the collective
data-access routines. (See NOTE, below.) <p>
- coll_write_bufsize:  Maximum size
of the buffer used by MPI I/O to satisfy write requests in the collective
data-access routines. (See NOTE, below.) <p>
NOTE: A buffer size smaller than
the distance (in bytes) in a UNIX file between the first byte and the last
byte of the access request causes MPI I/O to iterate and perform multiple
UNIX read() or write() calls. If the request includes multiple noncontiguous
chunks of data, and the buffer size is greater than the size of those chunks,
then the UNIX read() or write() (made at the MPI I/O level) will access
data not requested by this process in order to reduce the total number
of write() calls made. If this is not desirable behavior, you should reduce
this buffer size to equal the size of the contiguous chunks within the
aggregate request. <p>
- mpiio_concurrency: (boolean) controls whether nonblocking
I/O routines can bind an extra thread to an LWP. <p>
- mpiio_coll_contiguous:
(boolean) controls whether subsequent collective data accesses will request
collectively contiguous regions of the file. <p>
NON-SETTABLE HINTS:  <p>
- filename:
Access this hint to get the name of the file.
<p>
<h2><a name='sect9' href='#toc9'>Fortran 77 Notes</a></h2>
The MPI
standard prescribes portable Fortran syntax for the <i>DISP</i> argument only
for Fortran 90.  FORTRAN 77 users may use the non-portable syntax <p>
<br>
<pre>     INTEGER*MPI_OFFSET_KIND DISP
</pre><p>
where MPI_OFFSET_KIND is a constant defined in mpif.h and gives the length
of the declared integer in bytes.
<p>
<h2><a name='sect10' href='#toc10'>Errors</a></h2>
Almost all MPI routines return
an error value; C routines as the value of the function and Fortran routines
in the last argument. C++ functions do not return errors. If the default
error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the
C++ exception mechanism will be used to throw an MPI::Exception object.
<p>
Before the error value is returned, the current MPI error handler is called.
For MPI I/O function errors, the default error handler is set to MPI_ERRORS_RETURN.
The error handler may be changed with <a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a>; the predefined
error handler MPI_ERRORS_ARE_FATAL may be used to make I/O errors fatal.
Note that MPI does not guarantee that an MPI program can continue past
an error.
<p>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>Fortran Syntax (see FORTRAN 77 NOTES)</a></li>
<li><a name='toc3' href='#sect3'>C++ Syntax</a></li>
<li><a name='toc4' href='#sect4'>Input/Output Parameter</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameter</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Hints</a></li>
<li><a name='toc9' href='#sect9'>Fortran 77 Notes</a></li>
<li><a name='toc10' href='#sect10'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
