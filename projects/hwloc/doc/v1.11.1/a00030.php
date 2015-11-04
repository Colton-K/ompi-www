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
<!-- Generated by Doxygen 1.8.9.1 -->
  <div id="navrow1" class="tabs">
    <ul class="tablist">
      <li><a href="index.php"><span>Main&#160;Page</span></a></li>
      <li class="current"><a href="pages.php"><span>Related&#160;Pages</span></a></li>
      <li><a href="modules.php"><span>Modules</span></a></li>
      <li><a href="annotated.php"><span>Data&#160;Structures</span></a></li>
    </ul>
  </div>
</div><!-- top -->
<div class="header">
  <div class="headertitle">
<div class="title">Frequently Asked Questions </div>  </div>
</div><!--header-->
<div class="contents">
<div class="textblock"><h1><a class="anchor" id="faq_xml"></a>
I do not want hwloc to rediscover my enormous machine topology every time I rerun a process</h1>
<p>Although the topology discovery is not expensive on common machines, its overhead may become significant when multiple processes repeat the discovery on large machines (for instance when starting one process per core in a parallel application). The machine topology usually does not vary much, except if some cores are stopped/restarted or if the administrator restrictions are modified. Thus rediscovering the whole topology again and again may look useless.</p>
<p>For this purpose, hwloc offers XML import/export features. It lets you save the discovered topology to a file (for instance with the lstopo program) and reload it later by setting the HWLOC_XMLFILE environment variable. The HWLOC_THISSYSTEM environment variable should also be set to 1 to assert that loaded file is really the underlying system.</p>
<p>Loading a XML topology is usually much faster than querying multiple files or calling multiple functions of the operating system. It is also possible to manipulate such XML files with the C programming interface, and the import/export may also be directed to memory buffer (that may for instance be transmitted between applications through a package). See also <a class="el" href="a00018.php">Importing and exporting topologies from/to XML files</a>.</p>
<h1><a class="anchor" id="faq_multitopo"></a>
How many topologies may I use in my program?</h1>
<p>hwloc lets you manipulate multiple topologies at the same time. However these topologies consume memory and system resources (for instance file descriptors) until they are destroyed. It is therefore discouraged to open the same topology multiple times.</p>
<p>Sharing a single topology between threads is easy (see <a class="el" href="a00024.php">Thread Safety</a>) since the vast majority of accesses are read-only.</p>
<p>If multiple topologies of different (but similar) nodes are needed in your program, have a look at <a class="el" href="a00030.php#faq_diff">How to avoid memory waste when manipulating multiple similar topologies?</a>.</p>
<h1><a class="anchor" id="faq_diff"></a>
How to avoid memory waste when manipulating multiple similar topologies?</h1>
<p>hwloc does not share information between topologies. If multiple similar topologies are loaded in memory, for instance the topologies of different identical nodes of a cluster, lots of information will be duplicated.</p>
<p><a class="el" href="a00060_source.php" title="Topology differences. ">hwloc/diff.h</a> (see also <a class="el" href="a00099.php">Topology differences</a>) offers the ability to compute topology differences, apply or unapply them, or export/import to/from XML. However this feature is limited to basic differences such as attribute changes. It does not support complex modifications such as adding or removing some objects.</p>
<h1><a class="anchor" id="faq_slow_lstopo"></a>
Why is lstopo slow?</h1>
<p>lstopo enables most hwloc discovery flags by default so that the output topology is as precise as possible (while hwloc disables many of them by default). This includes I/O device discovery through PCI libraries as well as external libraries such as NVML. To speed up lstopo, you may disable such features with command-line options such as <code>--no-io</code>.</p>
<p>When NVIDIA GPU probing is enabled with CUDA or NVML, one should make sure that the <em>Persistent</em> mode is enabled (with <code>nvidia-smi -pm 1</code>) to avoid significant GPU initialization overhead.</p>
<p>When AMD GPU discovery is enabled with OpenCL and hwloc is used remotely over ssh, some spurious round-trips on the network may significantly increase the discovery time. Forcing the <code>DISPLAY</code> environment variable to the remote X server display (usually <code>:0</code>) instead of only setting the <code>COMPUTE</code> variable may avoid this.</p>
<p>Also remember that these components may be disabled at build-time with configure flags such as <code>--disable-opencl</code>, <code>--disable-cuda</code> or <code>--disable-nvml</code>, and at runtime with the environment variable <code>HWLOC_COMPONENTS=-opencl,cuda,nvml</code>.</p>
<p>If loading topologies is slow because the machine contains tons of processors, one should also consider using XML (see <a class="el" href="a00030.php#faq_xml">I do not want hwloc to rediscover my enormous machine topology every time I rerun a process</a>).</p>
<h1><a class="anchor" id="faq_os_error"></a>
What should I do when hwloc reports "operating system" warnings?</h1>
<p>When the operating system reports invalid locality information (because of either software or hardware bugs), hwloc may fail to insert some objects in the topology because they cannot fit in the already built tree of resources. If so, hwloc will report a warning like the following. The object causing this error is ignored, the discovery continues but the resulting topology will miss some objects and may be asymmetric (see also <a class="el" href="a00030.php#faq_asymmetric">What happens if my topology is asymmetric?</a>).</p>
<pre class="fragment">****************************************************************************
* hwloc has encountered what looks like an error from the operating system.
*
* L3 (cpuset 0x000003f0) intersects with NUMANode (P#0 cpuset 0x0000003f) without inclusion!
* Error occurred in topology.c line 940
*
* Please report this error message to the hwloc user's mailing list,
* along with the output from the hwloc-gather-topology script.
****************************************************************************
</pre><p>As explained in the message, reporting this issue to the hwloc developers (by sending the tarball that is generated by the hwloc-gather-topology script on this platform) is a good way to make sure that this is a software (operating system) or hardware bug (BIOS, etc).</p>
<p>These errors are common on large AMD platforms because several BIOS releases fail to properly report L3 caches. In the above example, the hardware reports a L3 cache that is shared by 2 cores in the first NUMA node and 4 cores in the second NUMA node. That's wrong, it should actually be shared by all 6 cores in a single NUMA node. The resulting topology will miss some L3 caches. If your application not care about cache sharing, or if you do not plan to request cache-aware binding in your process launcher, you may likely ignore this error.</p>
<p>Some platforms report similar warnings about conflicting Packages and NUMANodes. Upgrading the BIOS and/or the operating system may help. Otherwise, the warning may be hidden by setting HWLOC_HIDE_ERRORS=1 in your environment.</p>
<h1><a class="anchor" id="faq_privileged"></a>
Does hwloc require privileged access?</h1>
<p>hwloc discovers the topology by querying the operating system. Some minor features may require privileged access to the operation system. For instance memory module and PCI link speed discovery on Linux is reserved to root, and the entire PCI discovery on Solaris and BSDs requires access to some special files that are usually restricted to root (/dev/pci* or /devices/pci*).</p>
<p>To workaround this limitation, it is recommended to export the topology as a XML file generated by the administrator (with the lstopo program) and make it available to all users (see <a class="el" href="a00018.php">Importing and exporting topologies from/to XML files</a>). It will offer all discovery information to any application without requiring any privileged access anymore. Only the necessary hardware characteristics will be exported, no sensitive information will be disclosed through this XML export.</p>
<p>This XML-based model also has the advantage of speeding up the discovery because reading a XML topology is usually much faster than querying the operating system again.</p>
<h1><a class="anchor" id="faq_onedim"></a>
hwloc only has a one-dimensional view of the architecture, it ignores distances</h1>
<p>hwloc places all objects in a tree. Each level is a one-dimensional view of a set of similar objects. All children of the same object (siblings) are assumed to be equally interconnected (same distance between any of them), while the distance between children of different objects (cousins) is supposed to be larger.</p>
<p>Modern machines exhibit complex hardware interconnects, so this tree may miss some information about the actual physical distances between objects. The hwloc topology may therefore be annotated with distance information that may be used to build a more realistic representation (multi-dimensional) of each level. For instance, the root object may contain a distance matrix that represents the latencies between any pairs of NUMA nodes if the BIOS and/or operating system reports them.</p>
<h1><a class="anchor" id="faq_nosmt"></a>
What happens to my topology if I disable symmetric multithreading, hyper-threading, etc. ?</h1>
<p>hwloc creates one PU (processing unit) object per hardware thread. If your machine supports symmetric multithreading, for instance Hyper-Threading, each Core object may contain multiple PU objects: </p><pre class="fragment">$ lstopo -
...
  Core L#0
    PU L#0 (P#0)
    PU L#1 (P#2)
  Core L#1
    PU L#2 (P#1)
    PU L#3 (P#3)
</pre><p>x86 machines usually offer the ability to disable hyper-threading in the BIOS. Or it can be disabled on the Linux kernel command-line at boot time, or later by writing in sysfs virtual files.</p>
<p>If you do so, the hwloc topology structure does not significantly change, but some PU objects will not appear anymore. No level will disappear, you will see the same number of Core objects, but each of them will contain a single PU now. The PU level does not disappear either (remember that hwloc topologies always contain a PU level at the bottom of the topology) even if there is a single PU object per Core parent. </p><pre class="fragment">$ lstopo -
...
  Core L#0
    PU L#0 (P#0)
  Core L#1
    PU L#1 (P#1)
</pre><h1><a class="anchor" id="faq_smt"></a>
How may I ignore symmetric multithreading, hyper-threading, etc. ?</h1>
<p>First, see <a class="el" href="a00030.php#faq_nosmt">What happens to my topology if I disable symmetric multithreading, hyper-threading, etc. ?</a> for more information about multithreading.</p>
<p>If you need to ignore symmetric multithreading in software, you should likely manipulate hwloc Core objects directly: </p><pre class="fragment">/* get the number of cores */
unsigned nbcores = hwloc_get_nbobjs_by_type(topology, HWLOC_OBJ_CORE);
...
/* get the third core below the first package */
hwloc_obj_t package, core;
package = hwloc_get_obj_by_type(topology, HWLOC_OBJ_PACKAGE, 0);
core = hwloc_get_obj_inside_cpuset_by_type(topology, package-&gt;cpuset,
                                           HWLOC_OBJ_CORE, 2);
</pre><p>Whenever you want to bind a process or thread to a core, make sure you singlify its cpuset first, so that the task is actually bound to a single thread within this core (to avoid useless migrations). </p><pre class="fragment">/* bind on the second core */
hwloc_obj_t core = hwloc_get_obj_by_type(topology, HWLOC_OBJ_CORE, 1);
hwloc_cpuset_t set = hwloc_bitmap_dup(core-&gt;cpuset);
hwloc_bitmap_singlify(set);
hwloc_set_cpubind(topology, set, 0);
hwloc_bitmap_free(set);
</pre><p>With hwloc-calc or hwloc-bind command-line tools, you may specify that you only want a single-thread within each core by asking for their first PU object: </p><pre class="fragment">$ hwloc-calc core:4-7
0x0000ff00
$ hwloc-calc core:4-7.pu:0
0x00005500
</pre><p>When binding a process on the command-line, you may either specify the exact thread that you want to use, or ask hwloc-bind to singlify the cpuset before binding </p><pre class="fragment">$ hwloc-bind core:3.pu:0 -- echo "hello from first thread on core #3"
hello from first thread on core #3
...
$ hwloc-bind core:3 --single -- echo "hello from a single thread on core #3"
hello from a single thread on core #3
</pre><h1><a class="anchor" id="faq_asymmetric"></a>
What happens if my topology is asymmetric?</h1>
<p>hwloc supports asymmetric topologies even if most platforms are usually symmetric. For example, there could be different types of processors in a single machine, each with different numbers of cores, symmetric multithreading, or levels of caches.</p>
<p>In practice, asymmetric topologies mostly appear when intermediate groups are added for I/O affinity: on a 4-package machine, an I/O bus may be connected to 2 packages. These packages are below an additional Group object, while the other packages are not.</p>
<p>Before hwloc v2.0, <a class="el" href="a00079.php#ga1f987bca941d6949faf7b1554dd7bc12" title="Ignore an object type if it does not bring any structure. ">hwloc_topology_ignore_type_keep_structure()</a> and <a class="el" href="a00079.php#ga7c9cf147442d65d755c664ccde3bb3ef" title="Ignore all objects that do not bring any structure. ">hwloc_topology_ignore_all_keep_structure()</a> may also make topologies assymetric by removing parts of levels, especially when part of the machine is disallowed by administrator restrictions (e.g. Linux cgroups).</p>
<p>To understand how hwloc manages such cases, one should first remember the meaning of levels and cousin objects. All objects of the same type are gathered as horizontal levels with a given depth. They are also connected through the cousin pointers of the <a class="el" href="a00038.php" title="Structure of a topology object. ">hwloc_obj</a> structure. Some types, such as Caches or Groups, are annotated with a depth or level attribute (for instance L2 cache or Group1). Moreover caches have a type attribute (for instance L1i or L1d). Such attributes are also taken in account when gathering objects as horizontal levels. To be clear: there will be one level for L1i caches, another level for L1d caches, another one for L2, etc.</p>
<p>If the topology is asymmetric (e.g., if a group is missing above some processors), a given horizontal level will still exist if there exist any objects of that type. However, some branches of the overall tree may not have an object located in that horizontal level. Note that this specific hole within one horizontal level does not imply anything for other levels. All objects of the same type are gathered in horizontal levels even if their parents or children have different depths and types.</p>
<p>See the diagram in <a class="el" href="a00002.php">Terms and Definitions</a> for a graphical representation of such topologies.</p>
<p>Moreover, it is important to understand that a same parent object may have children of different types (and therefore, different depths). <b>These children are therefore siblings (because they have the same parent), but they are <em>not</em> cousins (because they do not belong to the same horizontal level).</b></p>
<h1><a class="anchor" id="faq_annotate"></a>
How do I annotate the topology with private notes?</h1>
<p>Each hwloc object contains a <code>userdata</code> field that may be used by applications to store private pointers. This field is only valid during the lifetime of these container object and topology. It becomes invalid as soon the topology is destroyed, or as soon as the object disappears, for instance when restricting the topology. The userdata field is not exported/imported to/from XML by default since hwloc does not know what it contains. This behavior may be changed by specifying application-specific callbacks with <code><a class="el" href="a00086.php#ga9d6ff0f7a8dd45be9aa8575ef31978cc" title="Set the application-specific callback for exporting object userdata. ">hwloc_topology_set_userdata_export_callback()</a></code> and <code><a class="el" href="a00086.php#ga5ac6917ea7289955fb1ffda4353af9b0" title="Set the application-specific callback for importing userdata. ">hwloc_topology_set_userdata_import_callback()</a></code>.</p>
<p>Each object may also contain some <em>info</em> attributes (key name and value) that are setup by hwloc during discovery and that may be extended by the user with <code><a class="el" href="a00081.php#ga7e90c5398a9d77df31d7d45faf0f316b" title="Add the given info name and value pair to the given object. ">hwloc_obj_add_info()</a></code> (see also <a class="el" href="a00016.php">Object attributes</a>). Contrary to the <code>userdata</code> field which is unique, multiple info attributes may exist for each object, even with the same name. These attributes are always exported to XML. However only character strings may be used as key names and values.</p>
<p>It is also possible to insert Misc objects with a custom name anywhere as a leaf of the topology (see <a class="el" href="a00012.php">Miscellaneous objects</a>). And Misc objects may have their own userdata and info attributes just like any other object.</p>
<p>The hwloc-annotate command-line tool may be used for adding Misc objects and info attributes.</p>
<p>There is also a topology-specific userdata pointer that can be used to recognize different topologies by storing a custom pointer. It may be manipulated with <code><a class="el" href="a00079.php#ga2cc7b7b155cba58dda203e54f1637b9c" title="Set the topology-specific userdata pointer. ">hwloc_topology_set_userdata()</a></code> and <code><a class="el" href="a00079.php#ga91f992f8d6c4905b2d3c4f43e509c2a3" title="Retrieve the topology-specific userdata pointer. ">hwloc_topology_get_userdata()</a></code>.</p>
<h1><a class="anchor" id="faq_valgrind"></a>
Why does Valgrind complain about hwloc memory leaks?</h1>
<p>If you are debugging your application with Valgrind, you want to avoid memory leak reports that are caused by hwloc and not by your program.</p>
<p>hwloc itself is often checked with Valgrind to make sure it does not leak memory. However some global variables in hwloc dependencies are never freed. For instance libz allocates its global state once at startup and never frees it so that it may be reused later. Some libxml2 global state is also never freed because hwloc does not know whether it can safely ask libxml2 to free it (the application may also be using libxml2 outside of hwloc).</p>
<p>These unfreed variables cause leak reports in Valgrind. hwloc installs a Valgrind <em>suppressions</em> file to hide them. You should pass the following command-line option to Valgrind to use it: </p><pre class="fragment">  --suppressions=/path/to/hwloc-valgrind.supp
</pre><h1><a class="anchor" id="faq_upgrade"></a>
How do I handle ABI breaks and API upgrades?</h1>
<p>The hwloc interface is extended with every new major release. Any application using the hwloc API should be prepared to check at compile-time whether some features are available in the currently installed hwloc distribution.</p>
<p>For instance, to check whether the hwloc version is at least 1.10, you should use: </p><pre class="fragment">#include &lt;hwloc.h&gt;
#if HWLOC_API_VERSION &gt;= 0x00010a00
...
#endif
</pre><p>The hwloc interface will be deeply modified in release 2.0 to fix several issues of the 1.x interface. The ABI will be broken, which means <b>applications must be recompiled against the new 2.0 interface</b>.</p>
<p>To check that you are not mixing old/recent headers with a recent/old runtime library: </p><pre class="fragment">#include &lt;hwloc.h&gt;
#if HWLOC_API_VERSION &gt;= 0x00020000
  /* headers are recent */
  if (hwloc_get_api_version() &lt; 0x20000)
    ... error out, the hwloc runtime library is older than 2.0 ...
#else
  /* headers are pre-2.0 */
  if (hwloc_get_api_version() &gt;= 0x20000)
    ... error out, the hwloc runtime library is more recent than 2.0 ...
#endif
</pre><p>You should not try to remain compatible with very old releases such as 1.1.x or earlier because <code>HWLOC_API_VERSION</code> was added in 1.0.0 and <code><a class="el" href="a00074.php#ga9c0b50c98add1adf57ed1ce85bb5190d" title="Indicate at runtime which hwloc API version was used at build time. ">hwloc_get_api_version()</a></code> came only in 1.1.1. Also do not use the old cpuset API since it was deprecated and superseded by the bitmap API in 1.1, and later removed in 1.5.</p>
<h1><a class="anchor" id="faq_bgq"></a>
How do I build hwloc for BlueGene/Q?</h1>
<p>IBM BlueGene/Q machines run a standard Linux on the I/O node and a custom CNK (<em>Compute Node Kernel</em>) on the compute nodes. To run on the compute node, hwloc must be cross-compiled from the I/O node with the following configuration line: </p><pre class="fragment">./configure --host=powerpc64-bgq-linux --disable-shared --enable-static \
  CPPFLAGS='-I/bgsys/drivers/ppcfloor -I/bgsys/drivers/ppcfloor/spi/include/kernel/cnk/'
</pre><p>CPPFLAGS may have to be updated if your platform headers are installed in a different directory.</p>
<h1><a class="anchor" id="faq_netbsd_bind"></a>
How to get useful topology information on NetBSD?</h1>
<p>The NetBSD (and FreeBSD) backend uses x86-specific topology discovery (through the x86 component). This implementation requires CPU binding so as to query topology information from each individual logical processor. This means that hwloc cannot find any useful topology information unless user-level process binding is allowed by the NetBSD kernel. The <code>security.models.extensions.user_set_cpu_affinity</code> sysctl variable must be set to 1 to do so. Otherwise, only the number of logical processors will be detected.</p>
<h1><a class="anchor" id="faq_phi"></a>
How do I build for Intel Xeon Phi coprocessor?</h1>
<p>Intel Xeon Phi coprocessors usually runs a Linux environment but cross-compiling from the host is required. hwloc uses standard autotools options for cross-compiling. For instance, to build for a <em>Knights Corner (KNC)</em> coprocessor:</p>
<p>If building with <code>icc</code>: </p><pre class="fragment">./configure CC="icc -mmic" --host=x86_64-k1om-linux --build=x86_64-unknown-linux-gnu
</pre><p>If building with the Xeon Phi-specific GCC that comes with the MPSS environment, for instance <code>/usr/linux-k1om-4.7/bin/x86_64-k1om-linux-gcc</code>: </p><pre class="fragment">export PATH=$PATH:/usr/linux-k1om-4.7/bin/
./configure --host=x86_64-k1om-linux --build=x86_64-unknown-linux-gnu
</pre> </div></div><!-- contents -->
<?php
include_once("$topdir/includes/footer.inc");