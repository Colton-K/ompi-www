<?php
$topdir = "../../..";
$title = "MPI_Scan(3) man page (version 1.10.0)";
$meta_desc = "Open MPI v1.10.0 man page: MPI_SCAN(3)";

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
<b>MPI_Scan, <a href="../man3/MPI_Iscan.3.php">MPI_Iscan</a></b> - Computes an inclusive scan (partial reduction)

<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<p>
<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Scan(const void *sendbuf, void *recvbuf, int count,
             MPI_Datatype datatype, MPI_Op op, MPI_Comm comm)
int <a href="../man3/MPI_Iscan.3.php">MPI_Iscan</a>(const void *sendbuf, void *recvbuf, int count,
              MPI_Datatype datatype, MPI_Op op, MPI_Comm comm,
              MPI_Request *request)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_SCAN(SENDBUF, RECVBUF, COUNT, DATATYPE, OP, COMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDBUF(*), RECVBUF(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, DATATYPE, OP, COMM, IERROR
<a href="../man3/MPI_Iscan.3.php">MPI_ISCAN</a>(SENDBUF, RECVBUF, COUNT, DATATYPE, OP, COMM, REQUEST, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDBUF(*), RECVBUF(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, DATATYPE, OP, COMM, REQUEST, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Intracomm::Scan(const void* sendbuf, void* recvbuf,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int count, const MPI::Datatype&amp; datatype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Op&amp; op) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>sendbuf </dt>
<dd>Send buffer (choice). </dd>

<dt>count </dt>
<dd>Number of elements in
input buffer (integer). </dd>

<dt>datatype </dt>
<dd>Data type of elements of input buffer (handle).
</dd>

<dt>op </dt>
<dd>Operation (handle). </dd>

<dt>comm </dt>
<dd>Communicator (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>recvbuf
</dt>
<dd>Receive buffer (choice). </dd>

<dt>request </dt>
<dd>Request (handle, non-blocking only). </dd>

<dt>IERROR
</dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Scan is used to perform
an inclusive prefix reduction on data distributed across the calling processes.
The operation returns, in the <i>recvbuf</i> of the process with rank i, the reduction
(calculated according to the function <i>op</i>) of the values in the <i>sendbuf</i>s
of processes with ranks 0, ..., i (inclusive). The type of operations supported,
their semantics, and the constraints on send and receive buffers are as
for <a href="../man3/MPI_Reduce.3.php">MPI_Reduce</a>.
<p>
<h2><a name='sect8' href='#toc8'>Example</a></h2>
This example uses a user-defined operation to produce
a segmented scan. A segmented scan takes, as input, a set of values and
a set of logicals, where the logicals delineate the various segments of
the scan. For example, <p>
<br>
<pre>values     v1      v2      v3      v4      v5      v6      v7      v8
logicals   0       0       1       1       1       0       0       1
result     v1    v1+v2     v3    v3+v4  v3+v4+v5   v6    v6+v7     v8
</pre><p>
The result for rank j is thus the sum v(i) + ... + v(j), where i is the lowest
rank such that for all ranks n, i &lt;= n &lt;= j, <i>logical(n)</i> = logical(j). The
operator that produces this effect is <p>
<br>
<pre>      [ u ]     [ v ]     [ w ]
      [   ]  o  [   ]  =  [   ]
      [ i ]     [ j ]     [ j ]
</pre><p>
where <p>
            ( u + v if i  = j<br>
       w  =  ( <br>
             ( v     if i != j<br>
 </pre><p>
Note that this is a noncommutative operator. C code that implements it
is given below. <p>
<br>
<pre><tt> </tt>&nbsp;<tt> </tt>&nbsp;typedef struct {
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;double val;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;int log;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;} SegScanPair;

<tt> </tt>&nbsp;<tt> </tt>&nbsp;/*
<tt> </tt>&nbsp;<tt> </tt>&nbsp; * the user-defined function
<tt> </tt>&nbsp;<tt> </tt>&nbsp; */
<tt> </tt>&nbsp;<tt> </tt>&nbsp;void segScan(SegScanPair *in, SegScanPair *inout, int *len,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Datatype *dptr)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;{
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;int i;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;SegScanPair c;

<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;for (i = 0; i &lt; *len; ++i) {
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;if (in-&gt;log == inout-&gt;log)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;c.val = in-&gt;val + inout-&gt;val;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;else
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;c.val = inout-&gt;val;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;c.log = inout-&gt;log;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;*inout = c;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;in++;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;inout++;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;}
<tt> </tt>&nbsp;<tt> </tt>&nbsp;}
</pre><p>
Note that the inout argument to the user-defined function corresponds to
the right-hand operand of the operator. When using this operator, we must
be careful to specify that it is noncommutative, as in the following: <p>
<br>
<pre><tt> </tt>&nbsp;<tt> </tt>&nbsp;int<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;i, base;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;SeqScanPair<tt> </tt>&nbsp;<tt> </tt>&nbsp;a, answer;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Op<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;myOp;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Datatype<tt> </tt>&nbsp;<tt> </tt>&nbsp;type[2] = {MPI_DOUBLE, MPI_INT};
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Aint<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;disp[2];
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;blocklen[2] = {1, 1};
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Datatype<tt> </tt>&nbsp;<tt> </tt>&nbsp;sspair;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;/*
<tt> </tt>&nbsp;<tt> </tt>&nbsp; * explain to MPI how type SegScanPair is defined
<tt> </tt>&nbsp;<tt> </tt>&nbsp; */
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<a href="../man3/MPI_Get_address.3.php">MPI_Get_address</a>(a, disp);
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<a href="../man3/MPI_Get_address.3.php">MPI_Get_address</a>(a.log, disp + 1);
<tt> </tt>&nbsp;<tt> </tt>&nbsp;base = disp[0];
<tt> </tt>&nbsp;<tt> </tt>&nbsp;for (i = 0; i &lt; 2; ++i)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;disp[i] -= base;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<a href="../man3/MPI_Type_struct.3.php">MPI_Type_struct</a>(2, blocklen, disp, type, &amp;sspair);
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<a href="../man3/MPI_Type_commit.3.php">MPI_Type_commit</a>(&amp;sspair);
<tt> </tt>&nbsp;<tt> </tt>&nbsp;/*
<tt> </tt>&nbsp;<tt> </tt>&nbsp; * create the segmented-scan user-op
<tt> </tt>&nbsp;<tt> </tt>&nbsp; * noncommutative - set commute (arg 2) to 0
<tt> </tt>&nbsp;<tt> </tt>&nbsp; */
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<a href="../man3/MPI_Op_create.3.php">MPI_Op_create</a>((MPI_User_function *)segScan, 0, &amp;myOp);
<tt> </tt>&nbsp;<tt> </tt>&nbsp;...
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Scan(a, answer, 1, sspair, myOp, comm);
</pre>
<p>
<h2><a name='sect9' href='#toc9'>Use of In-place Option</a></h2>
When the communicator is an intracommunicator, you
can perform a scanning operation in place (the output buffer is used as
the input buffer).  Use the variable MPI_IN_PLACE as the value of the <i>sendbuf</i>
argument.  The input data is taken from the receive buffer and replaced
by the output data.
<p>
<h2><a name='sect10' href='#toc10'>Notes on Collective Operations</a></h2>
The reduction functions
of type MPI_Op do not return an error value. As a result, if the functions
detect an error, all they can do is either call <a href="../man3/MPI_Abort.3.php">MPI_Abort</a> or silently skip
the problem. Thus, if the error handler is changed from MPI_ERRORS_ARE_FATAL
to something else (e.g., MPI_ERRORS_RETURN), then no error may be indicated.
<p>
The reason for this is the performance problems in ensuring that all collective
routines return the same error value.
<p>
<h2><a name='sect11' href='#toc11'>Errors</a></h2>
Almost all MPI routines return
an error value; C routines as the value of the function and Fortran routines
in the last argument. C++ functions do not return errors. If the default
error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the
C++ exception mechanism will be used to throw an MPI::Exception object.
<p>
Before the error value is returned, the current MPI error handler is called.
By default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error.  <p>
See the MPI man page for a full list of MPI error
codes.
<p>
<h2><a name='sect12' href='#toc12'>See Also</a></h2>
<br>
<pre><a href="../man3/MPI_Exscan.3.php">MPI_Exscan</a>
<a href="../man3/MPI_Op_create.3.php">MPI_Op_create</a>
<a href="../man3/MPI_Reduce.3.php">MPI_Reduce</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
