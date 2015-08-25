<?php
$topdir = "../../..";
$title = "MPI_Fetch_and_op(3) man page (version 1.10.0)";
$meta_desc = "Open MPI v1.10.0 man page: MPI_FETCH_AND_OP(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Fetch_and_op</b> - Combines the contents of the origin buffer
with that of a target buffer and returns the target buffer value.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C
Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Fetch_and_op(const void *origin_addr, void *esult_addr,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Datatype atatype, int target_rank, MPI_Aint target_disp,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Op op, MPI_Win win)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax (see FORTRAN 77 NOTES)</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_FETCH_AND_OP(ORIGIN_ADDR, RESULT_ADDR, DATATYPE, TARGET_RANK,
                 TARGET_DISP, OP, WIN, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt; ORIGIN_ADDR, RESULT_ADDR(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER(KIND=MPI_ADDRESS_KIND) TARGET_DISP
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER DATATYPE, TARGET_RANK, OP, WIN, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>Input Parameters</a></h2>

<dl>

<dt>origin_addr </dt>
<dd>Initial address of buffer (choice). </dd>

<dt>result_addr
</dt>
<dd>Initial address of result buffer (choice). </dd>

<dt>datatype </dt>
<dd>Data type of the entry
in origin, result, and target buffers (handle). </dd>

<dt>target_rank </dt>
<dd>Rank of target
(nonnegative integer). </dd>

<dt>target_disp </dt>
<dd>Displacement from start of window to
beginning of target buffer (nonnegative integer). </dd>

<dt>op </dt>
<dd>Reduce operation (handle).
</dd>

<dt>win </dt>
<dd>Window object (handle).
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output Parameter</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran only: Error
status (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
Accumulate one element of type <i>datatype</i> from
the origin buffer (<i>origin_addr</i>) to the buffer at offset <i>target_disp</i>, in
the target window specified by <i>target_rank</i> and <i>win</i>, using the operation
<i>op</i> and return in the result buffer <i>result_addr</i> the contents of the target
buffer before the accumulation. <p>
The origin and result buffers (<i>origin_addr</i>
and <i>result_addr</i>) must be disjoint. Any of the predefined operations for
<b>MPI_Rreduce</b>, as well as MPI_NO_OP or MPI_REPLACE, can be specified as <i>op</i>;
user-defined functions cannot be used. The <i>datatype</i> argument must be a predefined
datatype. The operation is executed atomically. <p>
A new predefined operation,
MPI_REPLACE, is defined. It corresponds to the associative function f(a,
b) =b; that is, the current value in the target memory is replaced by the
value supplied by the origin. <p>
A new predefined operation, MPI_NO_OP, is
defined. It corresponds to the assiciative function f(a, b) = a; that is
the current value in the target memory is returned in the result buffer
at the origin and no operation is performed on the target buffer.
<p>
<h2><a name='sect7' href='#toc7'>Fortran
77 Notes</a></h2>
The MPI standard prescribes portable Fortran syntax for the <i>TARGET_DISP</i>
argument only for Fortran 90.  FORTRAN 77 users may use the non-portable
syntax <p>
<br>
<pre>     INTEGER*MPI_ADDRESS_KIND TARGET_DISP
</pre><p>
where MPI_ADDRESS_KIND is a constant defined in mpif.h and gives the length
of the declared integer in bytes.
<p>
<h2><a name='sect8' href='#toc8'>Notes</a></h2>
It is the user&rsquo;s responsibility to
guarantee that, when using the accumulate functions, the target displacement
argument is such that accesses to the window are properly aligned according
to the data type arguments in the call to the MPI_Fetch_and_op function.

<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return an error value; C routines as the
value of the function and Fortran routines in the last argument. <p>
Before
the error value is returned, the current MPI error handler is called. By
default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <b><a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a></b>; the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error.
<p>
<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<p>
<a href="../man3/MPI_Get_accumulate.3.php">MPI_Get_accumulate</a> <br>
<a href="../man3/MPI_Reduce.3.php">MPI_Reduce</a> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax (see FORTRAN 77 NOTES)</a></li>
<li><a name='toc4' href='#sect4'>Input Parameters</a></li>
<li><a name='toc5' href='#sect5'>Output Parameter</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Fortran 77 Notes</a></li>
<li><a name='toc8' href='#sect8'>Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
<li><a name='toc10' href='#sect10'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
