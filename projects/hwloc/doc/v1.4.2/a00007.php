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
<!-- Generated by Doxygen 1.7.6.1 -->
  <div id="navrow1" class="tabs">
    <ul class="tablist">
      <li><a href="index.php"><span>Main&#160;Page</span></a></li>
      <li class="current"><a href="pages.php"><span>Related&#160;Pages</span></a></li>
      <li><a href="modules.php"><span>Modules</span></a></li>
      <li><a href="annotated.php"><span>Data&#160;Structures</span></a></li>
      <li><a href="files.php"><span>Files</span></a></li>
    </ul>
  </div>
</div>
<div class="header">
  <div class="headertitle">
<div class="title">Importing and exporting topologies from/to XML files </div>  </div>
</div><!--header-->
<div class="contents">
<div class="textblock"><p>hwloc offers the ability to export topologies to XML files and reload them later. This is for instance useful for loading topologies faster (see <a class="el" href="a00011.php#faq_xml">I do not want hwloc to rediscover my enormous machine topology every time I rerun a process</a>), manipulating other nodes' topology, or avoiding the need for privileged processes (see <a class="el" href="a00011.php#faq_privileged">Does hwloc require privileged access?</a>).</p>
<p>Topologies may be exported to XML files thanks to <a class="el" href="a00045.php#ga45578d725c66865cfef31d0585dcff70" title="Export the topology into an XML file.">hwloc_topology_export_xml()</a>, or to a XML memory buffer with <a class="el" href="a00045.php#ga739330e9402425315e44e5012631fb91" title="Export the topology into a newly-allocated XML memory buffer.">hwloc_topology_export_xmlbuffer()</a>. The lstopo program can also serve as a XML topology export tool.</p>
<p>XML topologies may then be reloaded later with <a class="el" href="a00044.php#ga93efcc8a962afe1ed23393700682173f" title="Enable XML-file based topology.">hwloc_topology_set_xml()</a> and <a class="el" href="a00044.php#gae7e4bade144652a2b48f5eaf0309b4ec" title="Enable XML based topology using a memory buffer (instead of a file, as with hwloc_topology_set_xml())...">hwloc_topology_set_xmlbuffer()</a>. The XMLFILE environment variable also tells hwloc to load the topology from the given XML file.</p>
<dl class="note"><dt><b>Note:</b></dt><dd>Loading XML topologies disables binding because the loaded topology may not correspond to the physical machine that loads it. This behavior may be reverted by asserting that loaded file really matches the underlying system with the HWLOC_THISSYSTEM environment variable or the HWLOC_TOPOLOGY_FLAG_IS_THISSYSTEM topology flag.</dd></dl>
<h2><a class="anchor" id="xml_backends"></a>
libxml2 and minimalistic XML backends</h2>
<p>hwloc offers two backends for importing/exporting XML.</p>
<p>First, it can use the libxml2 library for importing/exporting XML files. It features full XML support, for instance when those files have to be manipulated by non-hwloc software (e.g. a XSLT parser). The libxml2 backend is enabled by default if libxml2 development headers are available.</p>
<p>If libxml2 is not available at configure time, or if <code>--disable-libxml2</code> is passed, hwloc falls back to a custom backend. Contrary to the aforementioned full XML backend with libxml2, this minimalistic XML backend cannot be guaranteed to work with external programs. It should only be assumed to be compatible with the same hwloc release (even if using the libxml2 backend). Its advantage is however to always be available without requiring any external dependency.</p>
<h2><a class="anchor" id="xml_errors"></a>
XML import error management</h2>
<p>Importing XML files can fail at least because of file access errors, invalid XML syntax or non-hwloc-valid XML contents.</p>
<p>Both backend cannot detect all these errors when the input XML file or buffer is selected (when <a class="el" href="a00044.php#ga93efcc8a962afe1ed23393700682173f" title="Enable XML-file based topology.">hwloc_topology_set_xml()</a> or <a class="el" href="a00044.php#gae7e4bade144652a2b48f5eaf0309b4ec" title="Enable XML based topology using a memory buffer (instead of a file, as with hwloc_topology_set_xml())...">hwloc_topology_set_xmlbuffer()</a> is called). Some errors such non-hwloc-valid contents can only be detected later when loading the topology with <a class="el" href="a00043.php#ga91e2e6427b95fb7339c99dbbef996e71" title="Build the actual topology.">hwloc_topology_load()</a>.</p>
<p>It is therefore strongly recommended to check the return value of both <a class="el" href="a00044.php#ga93efcc8a962afe1ed23393700682173f" title="Enable XML-file based topology.">hwloc_topology_set_xml()</a> (or <a class="el" href="a00044.php#gae7e4bade144652a2b48f5eaf0309b4ec" title="Enable XML based topology using a memory buffer (instead of a file, as with hwloc_topology_set_xml())...">hwloc_topology_set_xmlbuffer()</a>) and <a class="el" href="a00043.php#ga91e2e6427b95fb7339c99dbbef996e71" title="Build the actual topology.">hwloc_topology_load()</a> to handle all these errors. </p>
</div></div><!-- contents -->
<?php
include_once("$topdir/includes/footer.inc");