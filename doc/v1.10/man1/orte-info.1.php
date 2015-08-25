<?php
$topdir = "../../..";
$title = "orte-info(1) man page (version 1.10.0)";
$meta_desc = "Open MPI v1.10.0 man page: orte-info(1)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
orte-info - Display information about the ORTE installation
<h2><a name='sect1' href='#toc1'>Synopsis</a></h2>
<b>orte-info
[options]</b>
<h2><a name='sect2' href='#toc2'>Description</a></h2>
<p>
<b>orte-info</b> provides detailed information about the
ORTE installation.  It can be useful for at least three common scenarios:
<p>
1. Checking local configuration and seeing how ORTE was installed. <p>
2. Submitting
bug reports / help requests to the ORTE community (see  <i>http://www.open-mpi.org/community/help/</i>)
<p>
3. Seeing a list of installed ORTE plugins and querying what  MCA parameters
they support.
<h2><a name='sect3' href='#toc3'>Options</a></h2>
<b>orte-info</b> accepts the following options:
<dl>

<dt><i>-a|--all</i>  </dt>
<dd>Show
all configuration options and MCA parameters </dd>

<dt><i>--arch</i>    </dt>
<dd>Show architecture
ORTE was compiled on </dd>

<dt><i>-c|--config</i> </dt>
<dd>Show configuration options </dd>

<dt><i>-gmca|--gmca</i> &lt;param&gt;
&lt;value&gt; </dt>
<dd>Pass global MCA parameters that are applicable to all contexts. </dd>

<dt><i>-h|--help</i>
</dt>
<dd>Shows help / usage message </dd>

<dt><i>--hostname</i> </dt>
<dd>Show the hostname that ORTE was configured
and built on </dd>

<dt><i>--internal</i> </dt>
<dd>Show internal MCA parameters (not meant to be modified
by users) </dd>

<dt><i>-mca|--mca</i> &lt;param&gt; &lt;value&gt; </dt>
<dd>Pass context-specific MCA parameters; they
are considered global if --gmca is not used and only one context is specified.
</dd>

<dt><i>--param</i> &lt;type&gt; &lt;component&gt; </dt>
<dd>Show MCA parameters.  The first parameter is the type
of the component to display; the second parameter is the specific component
to display (or the keyword "all", meaning "display all components of this
type"). </dd>

<dt><i>--parsable</i> </dt>
<dd>When used in conjunction with other parameters, the output
is displayed in a machine-parsable format <i>--parseable</i> Synonym for --parsable
</dd>

<dt><i>--path</i> &lt;type&gt; </dt>
<dd>Show paths that ORTE was configured with.  Accepts the following
parameters: prefix, bindir, libdir, incdir, pkglibdir, sysconfdir. </dd>

<dt><i>--pretty</i>
</dt>
<dd>When used in conjunction with other parameters, the output is displayed
in &rsquo;prettyprint&rsquo; format (default) </dd>

<dt><i>-v|--version</i> &lt;component&gt; &lt;scope&gt; </dt>
<dd>Show version of
ORTE or a component.  &lt;component&gt; can be the keywords "ompi" or "all", the
name of a framework (e.g., "coll" shows all components in the coll framework),
or the name of a specific component (e.g., "pls:rsh" shows the information
from the rsh PLS component).  &lt;scope&gt; can be one of: full, major, minor, release,
greek, svn.     </dd>
</dl>

<h2><a name='sect4' href='#toc4'>Examples</a></h2>

<dl>

<dt>orte-info </dt>
<dd>Show the default output of options and
listing of installed components in a human-readable / prettyprint format.
  </dd>

<dt>orte-info --parsable </dt>
<dd>Show the default output of options and listing of installed
components in a machine-parsable format.   </dd>

<dt>orte-info --param rmcast udp </dt>
<dd>Show
the MCA parameters of the "udp" RMCAST component in a human-readable / prettyprint
format.   </dd>

<dt>orte-info --param rmcast udp --parsable </dt>
<dd>Show the MCA parameters of
the "udp" RMCAST component in a machine-parsable format.   </dd>

<dt>orte-info --path
bindir </dt>
<dd>Show the "bindir" that ORTE was configured with.   </dd>

<dt>orte-info --version
orte full --parsable </dt>
<dd>Show the full version numbers of ORTE (including the
OPAL version number) in a machine-readable format.   </dd>

<dt>orte-info --version rmcast
major </dt>
<dd>Show the major version number of all RMCAST components in a prettyprint
format.   </dd>

<dt>orte-info --version rmcast:tcp minor </dt>
<dd>Show the minor version number
of the TCP RMCAST component in a prettyprint format.   </dd>

<dt>orte-info --all </dt>
<dd>Show
 <i>all</i>  information about the ORTE installation, including all components
that can be found, the MCA parameters that they support, versions of ORTE
and the components, etc.      </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Authors</a></h2>
The ORTE maintainers -- see  <i><i>http://www.openmpi.org/</i></i>
or the file <i>AUTHORS</i>. <p>
This manual page was originally contributed by Dirk
Eddelbuettel &lt;email-address-removed&gt;, one of the Debian GNU/Linux maintainers for
Open MPI, and may be used by others. <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Synopsis</a></li>
<li><a name='toc2' href='#sect2'>Description</a></li>
<li><a name='toc3' href='#sect3'>Options</a></li>
<li><a name='toc4' href='#sect4'>Examples</a></li>
<li><a name='toc5' href='#sect5'>Authors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
