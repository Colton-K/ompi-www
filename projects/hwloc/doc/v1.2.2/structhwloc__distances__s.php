<?php
$topdir = "../../../..";
# Note that we must use the PHP "$$" indirection to assign to the
# "title" variable, because if we list "$ title" (without the space)
# in this file, Doxygen will replace it with a string title.
$ver = basename(getcwd());
$thwarting_doxygen_preprocessor = "title";
$$thwarting_doxygen_preprocessor = "Portable Hardware Locality (hwloc) Documentation: $ver";
$header_include_file = "$topdir/projects/hwloc/doc/$ver/www.open-mpi.org-css.inc";

include_once("$topdir/projects/hwloc/nav.inc");
include_once("$topdir/includes/header.inc");
include_once("$topdir/includes/code.inc");
?>
<!-- Generated by Doxygen 1.7.4 -->
  <div id="navrow1" class="tabs">
    <ul class="tablist">
      <li><a href="index.php"><span>Main&#160;Page</span></a></li>
      <li><a href="pages.php"><span>Related&#160;Pages</span></a></li>
      <li><a href="modules.php"><span>Modules</span></a></li>
      <li class="current"><a href="annotated.php"><span>Data&#160;Structures</span></a></li>
      <li><a href="files.php"><span>Files</span></a></li>
    </ul>
  </div>
  <div id="navrow2" class="tabs2">
    <ul class="tablist">
      <li><a href="annotated.php"><span>Data&#160;Structures</span></a></li>
      <li><a href="functions.php"><span>Data&#160;Fields</span></a></li>
    </ul>
  </div>
</div>
<div class="header">
  <div class="summary">
<a href="#pub-attribs">Data Fields</a>  </div>
  <div class="headertitle">
<div class="title">hwloc_distances_s Struct Reference<div class="ingroups"><a class="el" href="group__hwlocality__objects.php">Topology Objects</a></div></div>  </div>
</div>
<div class="contents">
<!-- doxytag: class="hwloc_distances_s" -->
<p>Distances between objects.  
 <a href="structhwloc__distances__s.php#details">More...</a></p>

<p><code>#include &lt;<a class="el" href="hwloc_8h_source.php">hwloc.h</a>&gt;</code></p>
<table class="memberdecls">
<tr><td colspan="2"><h2><a name="pub-attribs"></a>
Data Fields</h2></td></tr>
<tr><td class="memItemLeft" align="right" valign="top">unsigned&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="structhwloc__distances__s.php#a6fe066eaf62ee448aa05bab8e7217ff7">relative_depth</a></td></tr>
<tr><td class="mdescLeft">&#160;</td><td class="mdescRight">Relative depth of the considered objects below the object containing this distance information.  <a href="#a6fe066eaf62ee448aa05bab8e7217ff7"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top">unsigned&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="structhwloc__distances__s.php#a4ca2af858cebbce7324ec49903d09474">nbobjs</a></td></tr>
<tr><td class="mdescLeft">&#160;</td><td class="mdescRight">Number of objects considered in the matrix. It is the number of descendant objects at <code>relative_depth</code> below the containing object. It corresponds to the result of hwloc_get_nbobjs_inside_cpuset_by_depth.  <a href="#a4ca2af858cebbce7324ec49903d09474"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top">float *&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="structhwloc__distances__s.php#a0f70f48d1bfb18e5e2008825da2967c9">latency</a></td></tr>
<tr><td class="mdescLeft">&#160;</td><td class="mdescRight">Matrix of latencies between objects, stored as a one-dimension array. May be <code>NULL</code> if the distances considered here are not latencies. Values are normalized to get 1.0 as the minimal value in the matrix. Latency from i-th to j-th object is stored in slot i*nbobjs+j.  <a href="#a0f70f48d1bfb18e5e2008825da2967c9"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top">float&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="structhwloc__distances__s.php#aab61bd1d1ae2e121bfe793c973ec829e">latency_max</a></td></tr>
<tr><td class="mdescLeft">&#160;</td><td class="mdescRight">The maximal value in the latency matrix.  <a href="#aab61bd1d1ae2e121bfe793c973ec829e"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top">float&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="structhwloc__distances__s.php#a204416418049a272bfb51602fc676342">latency_base</a></td></tr>
<tr><td class="mdescLeft">&#160;</td><td class="mdescRight">The multiplier that should be applied to latency matrix to retrieve the original OS-provided latencies. Usually 10 on Linux since ACPI SLIT uses 10 for local latency.  <a href="#a204416418049a272bfb51602fc676342"></a><br/></td></tr>
</table>
<hr/><a name="details" id="details"></a><h2>Detailed Description</h2>
<div class="textblock"><p>Distances between objects. </p>
<p>One object may contain a distance structure describing distances between all its descendants at a given relative depth. If the containing object is the root object of the topology, then the distances are available for all objects in the machine.</p>
<p>The distance may be a memory latency, as defined by the ACPI SLIT specification. If so, the <code>latency</code> pointer will not be <code>NULL</code> and the pointed array will contain non-zero values.</p>
<p>In the future, some other types of distances may be considered. In these cases, <code>latency</code> will be <code>NULL</code>. </p>
</div><hr/><h2>Field Documentation</h2>
<a class="anchor" id="a0f70f48d1bfb18e5e2008825da2967c9"></a><!-- doxytag: member="hwloc_distances_s::latency" ref="a0f70f48d1bfb18e5e2008825da2967c9" args="" -->
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">float* <a class="el" href="structhwloc__distances__s.php#a0f70f48d1bfb18e5e2008825da2967c9">hwloc_distances_s::latency</a></td>
        </tr>
      </table>
</div>
<div class="memdoc">

<p>Matrix of latencies between objects, stored as a one-dimension array. May be <code>NULL</code> if the distances considered here are not latencies. Values are normalized to get 1.0 as the minimal value in the matrix. Latency from i-th to j-th object is stored in slot i*nbobjs+j. </p>

</div>
</div>
<a class="anchor" id="a204416418049a272bfb51602fc676342"></a><!-- doxytag: member="hwloc_distances_s::latency_base" ref="a204416418049a272bfb51602fc676342" args="" -->
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">float <a class="el" href="structhwloc__distances__s.php#a204416418049a272bfb51602fc676342">hwloc_distances_s::latency_base</a></td>
        </tr>
      </table>
</div>
<div class="memdoc">

<p>The multiplier that should be applied to latency matrix to retrieve the original OS-provided latencies. Usually 10 on Linux since ACPI SLIT uses 10 for local latency. </p>

</div>
</div>
<a class="anchor" id="aab61bd1d1ae2e121bfe793c973ec829e"></a><!-- doxytag: member="hwloc_distances_s::latency_max" ref="aab61bd1d1ae2e121bfe793c973ec829e" args="" -->
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">float <a class="el" href="structhwloc__distances__s.php#aab61bd1d1ae2e121bfe793c973ec829e">hwloc_distances_s::latency_max</a></td>
        </tr>
      </table>
</div>
<div class="memdoc">

<p>The maximal value in the latency matrix. </p>

</div>
</div>
<a class="anchor" id="a4ca2af858cebbce7324ec49903d09474"></a><!-- doxytag: member="hwloc_distances_s::nbobjs" ref="a4ca2af858cebbce7324ec49903d09474" args="" -->
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">unsigned <a class="el" href="structhwloc__distances__s.php#a4ca2af858cebbce7324ec49903d09474">hwloc_distances_s::nbobjs</a></td>
        </tr>
      </table>
</div>
<div class="memdoc">

<p>Number of objects considered in the matrix. It is the number of descendant objects at <code>relative_depth</code> below the containing object. It corresponds to the result of hwloc_get_nbobjs_inside_cpuset_by_depth. </p>

</div>
</div>
<a class="anchor" id="a6fe066eaf62ee448aa05bab8e7217ff7"></a><!-- doxytag: member="hwloc_distances_s::relative_depth" ref="a6fe066eaf62ee448aa05bab8e7217ff7" args="" -->
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">unsigned <a class="el" href="structhwloc__distances__s.php#a6fe066eaf62ee448aa05bab8e7217ff7">hwloc_distances_s::relative_depth</a></td>
        </tr>
      </table>
</div>
<div class="memdoc">

<p>Relative depth of the considered objects below the object containing this distance information. </p>

</div>
</div>
<hr/>The documentation for this struct was generated from the following file:<ul>
<li><a class="el" href="hwloc_8h_source.php">hwloc.h</a></li>
</ul>
</div>
<?php
include_once("$topdir/includes/footer.inc");