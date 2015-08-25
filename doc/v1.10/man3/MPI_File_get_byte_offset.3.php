<?php
$topdir = "../../..";
$title = "MPI_File_get_byte_offset(3) man page (version 1.10.0)";
$meta_desc = "Open MPI v1.10.0 man page: MPI_FILE_GET_BYTE_OFFSET(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_File_get_byte_offset</b> - Converts a view-relative offset into
an absolute byte position.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>
<br>
<pre>C Syntax
    #include &lt;mpi.h&gt;
    int MPI_File_get_byte_offset(MPI_File fh, MPI_Offset offset,
    <tt> </tt>&nbsp;<tt> </tt>&nbsp;      MPI_Offset *disp)
</pre>
<h2><a name='sect2' href='#toc2'>Fortran Syntax (see FORTRAN 77 NOTES)</a></h2>
<br>
<pre>    INCLUDE &rsquo;mpif.h&rsquo;
    MPI_FILE_GET_BYTE_OFFSET(FH, OFFSET, DISP, IERROR)
        <tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;FH, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER(KIND=MPI_OFFSET_KIND) OFFSET, DISP
</pre>
<h2><a name='sect3' href='#toc3'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
MPI::Offset MPI::File::Get_byte_offset(const MPI::Offset disp)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const
</pre>
<h2><a name='sect4' href='#toc4'>Input Parameters</a></h2>

<dl>

<dt>fh     </dt>
<dd>File handle (handle). </dd>

<dt>offset </dt>
<dd>Offset (integer).
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output
Parameters</a></h2>

<dl>

<dt>disp </dt>
<dd>Absolute byte position of offset (integer).  </dd>

<dt>IERROR </dt>
<dd>Fortran
only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
MPI_File_get_byte_offset converts
an offset specified for the current view to its corresponding displacement
value, or absolute byte position, from the beginning of the file. The absolute
byte position of <i>offset</i> relative to the current view of <i>fh</i> is returned
in <i>disp</i>.
<p>
<h2><a name='sect7' href='#toc7'>Fortran 77 Notes</a></h2>
The MPI standard prescribes portable Fortran
syntax for the <i>OFFSET</i> and <i>DISP</i> arguments only for Fortran 90. Sun FORTRAN
77 users may use the non-portable syntax <p>
<br>
<pre>     INTEGER*MPI_OFFSET_KIND OFFSET
or
     INTEGER*MPI_OFFSET_KIND DISP
</pre><p>
where MPI_OFFSET_KIND is a constant defined in mpif.h and gives the length
of the declared integer in bytes.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
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
<li><a name='toc4' href='#sect4'>Input Parameters</a></li>
<li><a name='toc5' href='#sect5'>Output Parameters</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Fortran 77 Notes</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
