<?php
$topdir = "../../..";
$title = "MPI_Unpack(3) man page (version 1.10.0)";
$meta_desc = "Open MPI v1.10.0 man page: MPI_UNPACK(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Unpack</b> - Unpacks a datatype into contiguous memory.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C
Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Unpack(const void *inbuf, int insize, int *position,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;void *outbuf, int outcount, MPI_Datatype datatype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Comm comm)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_UNPACK(INBUF, INSIZE, POSITION, OUTBUF, OUTCOUNT,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;DATATYPE, COMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;INBUF(*), OUTBUF(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;INSIZE, POSITION, OUTCOUNT, DATATYPE,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void Datatype::Unpack(const void* inbuf, int insize,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;void *outbuf, int outcount, int&amp; position,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const Comm&amp; comm) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>inbuf       </dt>
<dd>Input buffer start (choice). </dd>

<dt>insize       </dt>
<dd>Size
of input buffer, in bytes (integer). </dd>

<dt>outcount       </dt>
<dd>Number of items to be
unpacked (integer). </dd>

<dt>datatype       </dt>
<dd>Datatype of each output data item (handle).
</dd>

<dt>comm       </dt>
<dd>Communicator for packed message (handle). <p>
</dd>
</dl>

<h2><a name='sect6' href='#toc6'>Input/Output Parameter</a></h2>

<dl>

<dt>position
      </dt>
<dd>Current position in bytes (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Output Parameters</a></h2>

<dl>

<dt>outbuf
  </dt>
<dd>Output buffer start (choice). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).

<p> </dd>
</dl>

<h2><a name='sect8' href='#toc8'>Description</a></h2>
Unpacks a message into the receive buffer specified by outbuf,
outcount, datatype from the buffer space specified by inbuf and insize.
The output buffer can be any communication buffer allowed in <a href="../man3/MPI_Recv.3.php">MPI_Recv</a>. The
input buffer is a contiguous storage area containing insize bytes, starting
at address inbuf. The input value of position is the first location in the
input buffer occupied by the packed message. <i>position</i> is incremented by
the size of the packed message, so that the output value of position is
the first location in the input buffer after the locations occupied by
the message that was unpacked. <i>comm</i> is the communicator used to receive
the packed message.
<p>
<h2><a name='sect9' href='#toc9'>Notes</a></h2>
Note the difference between <a href="../man3/MPI_Recv.3.php">MPI_Recv</a> and MPI_Unpack:
In <a href="../man3/MPI_Recv.3.php">MPI_Recv</a>, the <i>count</i> argument specifies the maximum number of items that
can be received. The actual number of items received is determined by the
length of the incoming message. In MPI_Unpack, the count argument specifies
the actual number of items that are to be unpacked; the "size" of the corresponding
message is the increment in position. The reason for this change is that
the "incoming message size" is not predetermined since the user decides
how much to unpack; nor is it easy to determine the "message size" from
the number of items to be unpacked. <p>
To understand the behavior of pack and
unpack, it is convenient to think of the data part of a message as being
the sequence obtained by concatenating the successive values sent in that
message. The pack operation stores this sequence in the buffer space, as
if sending the message to that buffer. The unpack operation retrieves this
sequence from buffer space, as if receiving a message from that buffer.
(It is helpful to think of internal Fortran files or sscanf in C for a
similar function.)  <p>
Several messages can be successively packed into one
packing unit. This is effected by several successive related calls to <a href="../man3/MPI_Pack.3.php">MPI_Pack</a>,
where the first call provides position = 0, and each successive call inputs
the value of position that was output by the previous call, and the same
values for outbuf, outcount, and comm. This packing unit now contains the
equivalent information that would have been stored in a message by one
send call with a send buffer that is the "concatenation" of the individual
send buffers. <p>
A packing unit can be sent using type MPI_Packed. Any point-to-point
or collective communication function can be used to move the sequence of
bytes that forms the packing unit from one process to another. This packing
unit can now be received using any receive operation, with any datatype:
The type-matching rules are relaxed for messages sent with type MPI_Packed.
  <p>
A message sent with any type (including MPI_Packed) can be received using
the type MPI_Packed. Such a message can then be unpacked by calls to MPI_Unpack.
<p>
A packing unit (or a message created by a regular, "typed" send) can be
unpacked into several successive messages. This is effected by several successive
related calls to MPI_Unpack, where the first call provides position = 0,
and each successive call inputs the value of position that was output by
the previous call, and the same values for inbuf, insize, and comm. <p>
The
concatenation of two packing units is not necessarily a packing unit; nor
is a substring of a packing unit necessarily a packing unit. Thus, one cannot
concatenate two packing units and then unpack the result as one packing
unit; nor can one unpack a substring of a packing unit as a separate packing
unit. Each packing unit that was created by a related sequence of pack calls
or by a regular send must be unpacked as a unit, by a sequence of related
unpack calls.
<p>
<h2><a name='sect10' href='#toc10'>Errors</a></h2>
Almost all MPI routines return an error value; C routines
as the value of the function and Fortran routines in the last argument.
C++ functions do not return errors. If the default error handler is set
to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception mechanism
will be used to throw an MPI::Exception object. <p>
Before the error value is
returned, the current MPI error handler is called. By default, this error
handler aborts the MPI job, except for I/O function errors. The error handler
may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined error handler
MPI_ERRORS_RETURN may be used to cause error values to be returned. Note
that MPI does not guarantee that an MPI program can continue past an error.

<p>
<h2><a name='sect11' href='#toc11'>See Also</a></h2>
<a href="../man3/MPI_Pack.3.php">MPI_Pack</a> <br>

<p><a href="../man3/MPI_Pack_size.3.php">MPI_Pack_size</a>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Input/Output Parameter</a></li>
<li><a name='toc7' href='#sect7'>Output Parameters</a></li>
<li><a name='toc8' href='#sect8'>Description</a></li>
<li><a name='toc9' href='#sect9'>Notes</a></li>
<li><a name='toc10' href='#sect10'>Errors</a></li>
<li><a name='toc11' href='#sect11'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
