<?php
$topdir = "../../..";
$title = "MPI_Type_get_contents(3) man page (version 1.10.0)";
$meta_desc = "Open MPI v1.10.0 man page: MPI_TYPE_GET_CONTENTS(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Type_get_contents</b> - Returns information about arguments used
in creation of a data type.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Type_get_contents(MPI_Datatype datatype, int max_integers,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int max_addresses, int max_datatypes, int array_of_integers[], MPI_Aint
array_of_addresses[], MPI_Datatype array_of_datatypes[])
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax (see FORTRAN 77 NOTES)</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_TYPE_GET_CONTENTS(DATATYPE, MAX_INTEGERS, MAX_ADDRESSES,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;MAX_DATATYPES, ARRAY_OF_INTEGERS, ARRAY_OF_ADDRESSES,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;ARRAY_OF_DATATYPES, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;DATATYPE, MAX_INTEGERS, MAX_ADDRESSES, MAX_DATATYPES
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;ARRAY_OF_INTEGERS(*), ARRAY_OF_DATATYPES(*), IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER(KIND=MPI_ADDRESS_KIND) ARRAY_OF_ADDRESSES(*)
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Datatype::Get_contents(int max_integers, int max_addresses,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int max_datatypes, int array_of_integers[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI::Aint array_of_addresses[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI::Datatype array_of_datatypes[]) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>datatype </dt>
<dd>Data type to access (handle). </dd>

<dt>max_integers </dt>
<dd>Number
of elements in <i>array_of_integers</i> (nonnegative integer). </dd>

<dt>max_addresses </dt>
<dd>Number
of elements in <i>array_of_addresses</i> (nonnegative integer). </dd>

<dt>max_datatypes </dt>
<dd>Number
of elements in <i>array_of_datatypes</i> (nonnegative integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>array_of_integers
</dt>
<dd>Contains integer arguments used in constructing <i>datatype</i> (array of integers).
</dd>

<dt>array_of_addresses </dt>
<dd>Contains address arguments used in constructing <i>datatype</i>
(array of integers). </dd>

<dt>array_of_datatypes </dt>
<dd>Contains data-type arguments used
in constructing <i>datatype</i> (array of integers). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error
status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
For the given data type, <a href="../man3/MPI_Type_get_envelope.3.php">MPI_Type_get_envelope</a>
returns information on the number and type of input arguments used in the
call that created the data type. The number-of-arguments values returned can
be used to provide sufficiently large arrays in the decoding routine MPI_Type_get_contents.
This call and the meaning of the returned values is described below. The
combiner reflects the MPI data type constructor call that was used in creating
<i>datatype</i>.
<p> The parameter <i>datatype</i> must be a predefined unnamed or a derived
data type. The call is erroneous if <i>datatype</i> is a predefined named data
type. <p>
The values given for <i>max_integers</i>, <i>max_addresses</i>, and <i>max_datatypes</i>
must be at least as large as the value returned in <i>num_integers</i>, <i>num_addresses</i>,
and <i>num_datatypes</i>, respectively, in the call <a href="../man3/MPI_Type_get_envelope.3.php">MPI_Type_get_envelope</a> for
the same <i>datatype</i> argument. <p>
The data types returned in <i>array_of_datatypes</i>
are handles to data-type objects that are equivalent to the data types used
in the original construction call. If these were derived data types, then
the returned data types are new data-type objects, and the user is responsible
for freeing these datatypes with <a href="../man3/MPI_Type_free.3.php">MPI_Type_free</a>. If these were predefined
data types, then the returned data type is equal to that (constant) predefined
data type and cannot be freed.  <p>
The committed state of returned derived
data types is undefined, that is, the data types may or may not be committed.
Furthermore, the content of attributes of returned data types is undefined.
 <p>
Note that MPI_Type_get_contents can be invoked with a data-type argument
that was constructed using <a href="../man3/MPI_Type_create_f90_real.3.php">MPI_Type_create_f90_real</a>, <a href="../man3/MPI_Type_create_f90_integer.3.php">MPI_Type_create_f90_integer</a>,
or <a href="../man3/MPI_Type_create_f90_complex.3.php">MPI_Type_create_f90_complex</a> (an unnamed predefined data type). In such
a case, an empty <i>array_of_datatypes</i> is returned.  <p>
In the MPI-1 data-type constructor
calls, the address arguments in Fortran are of type INTEGER. In the new
MPI-2 calls, the address arguments are of type INTEGER(KIND=MPI ADDRESS
KIND). The call MPI_Type_get_contents returns all addresses in an argument
of type INTEGER(KIND=MPI ADDRESS KIND). This is true even if the old MPI-1
calls were used. Thus, the location of values returned can be thought of
as being returned by the C bindings. It can also be determined by examining
the new MPI-2 calls for data-type constructors for the deprecated MPI-1 calls
that involve addresses.
<p>
<h2><a name='sect8' href='#toc8'>Fortran 77 Notes</a></h2>
The MPI standard prescribes portable
Fortran syntax for the <i>ARRAY_OF_ADDRESSES</i> argument only for Fortran 90.
FORTRAN 77 users may use the non-portable syntax <p>
<br>
<pre>     INTEGER*MPI_ADDRESS_KIND ARRAY_OF_ADDRESSES(*)
</pre><p>
where MPI_ADDRESS_KIND is a constant defined in mpif.h and gives the length
of the declared integer in bytes.
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
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
continue past an error.
<p>
<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<a href="../man3/MPI_Type_get_envelope.3.php">MPI_Type_get_envelope</a> <br>

<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax (see FORTRAN 77 NOTES)</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Fortran 77 Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
<li><a name='toc10' href='#sect10'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
