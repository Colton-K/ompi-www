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
<!-- Generated by Doxygen 1.6.2 -->
<div class="navigation" id="top">
  <div class="tabs">
    <ul>
      <li><a href="index.php"><span>Main&nbsp;Page</span></a></li>
      <li><a href="pages.php"><span>Related&nbsp;Pages</span></a></li>
      <li><a href="modules.php"><span>Modules</span></a></li>
      <li><a href="annotated.php"><span>Data&nbsp;Structures</span></a></li>
      <li class="current"><a href="files.php"><span>Files</span></a></li>
    </ul>
  </div>
  <div class="tabs">
    <ul>
      <li><a href="files.php"><span>File&nbsp;List</span></a></li>
      <li><a href="globals.php"><span>Globals</span></a></li>
    </ul>
  </div>
</div>
<div class="contents">
<h1>cpuset.h File Reference</h1>
<p>The Cpuset API, for use in hwloc itself.  
<a href="#_details">More...</a></p>
<code>#include &lt;hwloc/config.h&gt;</code><br/>

<p><a href="cpuset_8h_source.php">Go to the source code of this file.</a></p>
<table border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="2"><h2>Defines</h2></td></tr>
<tr><td class="memItemLeft" align="right" valign="top">#define&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga8f896ce703ad1740fdf9ce8ac6361359">hwloc_cpuset_foreach_begin</a>(cpu, set)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Loop macro iterating on CPU set <code>set</code>.  <a href="group__hwlocality__cpuset.php#ga8f896ce703ad1740fdf9ce8ac6361359"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top">#define&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gae2974be78a7d7cddbd38cb23fcc6240a">hwloc_cpuset_foreach_end</a>()</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">End of loop. Needs a terminating ';'.  <a href="group__hwlocality__cpuset.php#gae2974be78a7d7cddbd38cb23fcc6240a"></a><br/></td></tr>
<tr><td colspan="2"><h2>Typedefs</h2></td></tr>
<tr><td class="memItemLeft" align="right" valign="top">typedef struct hwloc_cpuset_s *&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a></td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Set of CPUs represented as an opaque pointer to an internal bitmask.  <a href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top">typedef struct hwloc_cpuset_s *&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a></td></tr>
<tr><td colspan="2"><h2>Functions</h2></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> <a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a>&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gaf270165b6a08e8418fcfb68f5793ff7f">hwloc_cpuset_alloc</a> (void) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Allocate a new empty CPU set.  <a href="group__hwlocality__cpuset.php#gaf270165b6a08e8418fcfb68f5793ff7f"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gaaac6c1536cdcc35f1a1a3a9ab84da80d">hwloc_cpuset_free</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> set)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Free CPU set <code>set</code>.  <a href="group__hwlocality__cpuset.php#gaaac6c1536cdcc35f1a1a3a9ab84da80d"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> <a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a>&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga468c6e3fd92a9d0db1fb56634a851be3">hwloc_cpuset_dup</a> (<a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Duplicate CPU set <code>set</code> by allocating a new CPU set and copying <code>set's</code> contents.  <a href="group__hwlocality__cpuset.php#ga468c6e3fd92a9d0db1fb56634a851be3"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga27a3b6994bd6f20c1f26d10bdb29ac0b">hwloc_cpuset_copy</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> dst, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> src)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Copy the contents of CPU set <code>src</code> into the already allocated CPU set <code>dst</code>.  <a href="group__hwlocality__cpuset.php#ga27a3b6994bd6f20c1f26d10bdb29ac0b"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> int&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga4ed0a2badc6ff03f4d91a8d3c505b3e6">hwloc_cpuset_snprintf</a> (char *restrict buf, size_t buflen, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Stringify a cpuset.  <a href="group__hwlocality__cpuset.php#ga4ed0a2badc6ff03f4d91a8d3c505b3e6"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> int&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga7a89398cbc58c9095aa094b9aeacbf00">hwloc_cpuset_asprintf</a> (char **strp, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Stringify a cpuset into a newly allocated string.  <a href="group__hwlocality__cpuset.php#ga7a89398cbc58c9095aa094b9aeacbf00"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> int&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gab6fb26149e25d4e5719a787ee01bacaa">hwloc_cpuset_from_string</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> set, const char *restrict string)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Parse a cpuset string and stores it in CPU set <code>set</code>.  <a href="group__hwlocality__cpuset.php#gab6fb26149e25d4e5719a787ee01bacaa"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gacabf3491be3ab41b4ad1ee28f72db89e">hwloc_cpuset_zero</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> set)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Empty the CPU set <code>set</code>.  <a href="group__hwlocality__cpuset.php#gacabf3491be3ab41b4ad1ee28f72db89e"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gacdc29003a0663e9b8b3a9d405a94fb70">hwloc_cpuset_fill</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> set)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Fill CPU set <code>set</code> with all possible CPUs (even if those CPUs don't exist or are otherwise unavailable).  <a href="group__hwlocality__cpuset.php#gacdc29003a0663e9b8b3a9d405a94fb70"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga81218f1945e8fa25bbbc4e6277019122">hwloc_cpuset_from_ulong</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> set, unsigned long mask)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Setup CPU set <code>set</code> from unsigned long <code>mask</code>.  <a href="group__hwlocality__cpuset.php#ga81218f1945e8fa25bbbc4e6277019122"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gac473267f1aa161c3e3e2a26ef25a477c">hwloc_cpuset_from_ith_ulong</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> set, unsigned i, unsigned long mask)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Setup CPU set <code>set</code> from unsigned long <code>mask</code> used as <code>i</code> -th subset.  <a href="group__hwlocality__cpuset.php#gac473267f1aa161c3e3e2a26ef25a477c"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> unsigned long&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga5eb912bf1d0572127c3eed1b8a47e6ac">hwloc_cpuset_to_ulong</a> (<a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Convert the beginning part of CPU set <code>set</code> into unsigned long <code>mask</code>.  <a href="group__hwlocality__cpuset.php#ga5eb912bf1d0572127c3eed1b8a47e6ac"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> unsigned long&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga7576f6a70291feafe9e538942c8b7ee5">hwloc_cpuset_to_ith_ulong</a> (<a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set, unsigned i) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Convert the <code>i</code> -th subset of CPU set <code>set</code> into unsigned long mask.  <a href="group__hwlocality__cpuset.php#ga7576f6a70291feafe9e538942c8b7ee5"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga8ee7aa4827fb49af47eac9b66c74fd78">hwloc_cpuset_cpu</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> set, unsigned cpu)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Empty the CPU set <code>set</code> and add CPU <code>cpu</code>.  <a href="group__hwlocality__cpuset.php#ga8ee7aa4827fb49af47eac9b66c74fd78"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga02d86bba61be473bfdceb336c9087736">hwloc_cpuset_all_but_cpu</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> set, unsigned cpu)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Empty the CPU set <code>set</code> and add all but the CPU <code>cpu</code>.  <a href="group__hwlocality__cpuset.php#ga02d86bba61be473bfdceb336c9087736"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga793d0c31b524337355ddce1c6568a866">hwloc_cpuset_set</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> set, unsigned cpu)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Add CPU <code>cpu</code> in CPU set <code>set</code>.  <a href="group__hwlocality__cpuset.php#ga793d0c31b524337355ddce1c6568a866"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga2f15dc90a98d14db8022f76a38c39727">hwloc_cpuset_set_range</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> set, unsigned begincpu, unsigned endcpu)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Add CPUs from <code>begincpu</code> to <code>endcpu</code> in CPU set <code>set</code>.  <a href="group__hwlocality__cpuset.php#ga2f15dc90a98d14db8022f76a38c39727"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga59f2a65f5260581ee642b0a8375be564">hwloc_cpuset_clr</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> set, unsigned cpu)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Remove CPU <code>cpu</code> from CPU set <code>set</code>.  <a href="group__hwlocality__cpuset.php#ga59f2a65f5260581ee642b0a8375be564"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga214d599ff5b66073460b7ee9a75016a8">hwloc_cpuset_clr_range</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> set, unsigned begincpu, unsigned endcpu)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Remove CPUs from <code>begincpu</code> to <code>endcpu</code> in CPU set <code>set</code>.  <a href="group__hwlocality__cpuset.php#ga214d599ff5b66073460b7ee9a75016a8"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> int&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga7236a9cf8be3ded29a912790e35065f7">hwloc_cpuset_isset</a> (<a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set, unsigned cpu) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Test whether CPU <code>cpu</code> is part of set <code>set</code>.  <a href="group__hwlocality__cpuset.php#ga7236a9cf8be3ded29a912790e35065f7"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> int&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gac5b8ad0c32e9d14c587eabde188182a9">hwloc_cpuset_iszero</a> (<a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Test whether set <code>set</code> is empty.  <a href="group__hwlocality__cpuset.php#gac5b8ad0c32e9d14c587eabde188182a9"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> int&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gab8703a0f28053bd3981852548e3182d1">hwloc_cpuset_isfull</a> (<a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Test whether set <code>set</code> is completely full.  <a href="group__hwlocality__cpuset.php#gab8703a0f28053bd3981852548e3182d1"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> int&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga9534d84820beade1e6155a1e734307a2">hwloc_cpuset_isequal</a> (<a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set1, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set2) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Test whether set <code>set1</code> is equal to set <code>set2</code>.  <a href="group__hwlocality__cpuset.php#ga9534d84820beade1e6155a1e734307a2"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> int&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gad7cbab558a9a80652c3ad0b30d488f04">hwloc_cpuset_intersects</a> (<a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set1, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set2) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Test whether sets <code>set1</code> and <code>set2</code> intersects.  <a href="group__hwlocality__cpuset.php#gad7cbab558a9a80652c3ad0b30d488f04"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> int&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga135bbe4177fbfe8b14bcbe6aad765801">hwloc_cpuset_isincluded</a> (<a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> sub_set, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> super_set) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Test whether set <code>sub_set</code> is part of set <code>super_set</code>.  <a href="group__hwlocality__cpuset.php#ga135bbe4177fbfe8b14bcbe6aad765801"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga9654f87331e6f33090bed3d326346e85">hwloc_cpuset_or</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> res, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set1, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set2)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Or sets <code>set1</code> and <code>set2</code> and store the result in set <code>res</code>.  <a href="group__hwlocality__cpuset.php#ga9654f87331e6f33090bed3d326346e85"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gacd5a399d475b7d75e71489177650b6df">hwloc_cpuset_and</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> res, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set1, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set2)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">And sets <code>set1</code> and <code>set2</code> and store the result in set <code>res</code>.  <a href="group__hwlocality__cpuset.php#gacd5a399d475b7d75e71489177650b6df"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga338fa981505cb2c87e3e9dc543a698b9">hwloc_cpuset_andnot</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> res, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set1, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set2)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">And set <code>set1</code> and the negation of <code>set2</code> and store the result in set <code>res</code>.  <a href="group__hwlocality__cpuset.php#ga338fa981505cb2c87e3e9dc543a698b9"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga82f8b81aa98c3a488e21838620da8852">hwloc_cpuset_xor</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> res, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set1, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set2)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Xor sets <code>set1</code> and <code>set2</code> and store the result in set <code>res</code>.  <a href="group__hwlocality__cpuset.php#ga82f8b81aa98c3a488e21838620da8852"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga9494650a8cb93e1dc77590e2393519a5">hwloc_cpuset_not</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> res, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Negate set <code>set</code> and store the result in set <code>res</code>.  <a href="group__hwlocality__cpuset.php#ga9494650a8cb93e1dc77590e2393519a5"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> int&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gaec614784aab4c1bd4d279fc548f4aa40">hwloc_cpuset_first</a> (<a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Compute the first CPU (least significant bit) in CPU set <code>set</code>.  <a href="group__hwlocality__cpuset.php#gaec614784aab4c1bd4d279fc548f4aa40"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> int&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gaf4fb6d1ca812633f2e5eaa8ae98b1aef">hwloc_cpuset_last</a> (<a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Compute the last CPU (most significant bit) in CPU set <code>set</code>.  <a href="group__hwlocality__cpuset.php#gaf4fb6d1ca812633f2e5eaa8ae98b1aef"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> int&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga6bf3fd9ea7b0d0fcb5656bab8b68c1bf">hwloc_cpuset_next</a> (<a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set, unsigned prev_cpu) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Compute the next CPU in CPU set <code>set</code> which is after CPU <code>prev_cpu</code>.  <a href="group__hwlocality__cpuset.php#ga6bf3fd9ea7b0d0fcb5656bab8b68c1bf"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> void&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gace7ad3d2a71d9884e7a28311228931af">hwloc_cpuset_singlify</a> (<a class="el" href="group__hwlocality__cpuset.php#ga7366332f7090f5b54d4b25a0c2c4b411">hwloc_cpuset_t</a> set)</td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Keep a single CPU among those set in CPU set <code>set</code>.  <a href="group__hwlocality__cpuset.php#gace7ad3d2a71d9884e7a28311228931af"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> int&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga6d54e9fa190351368ea08d02b6b09d32">hwloc_cpuset_compare_first</a> (<a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set1, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set2) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Compare CPU sets <code>set1</code> and <code>set2</code> using their lowest index CPU.  <a href="group__hwlocality__cpuset.php#ga6d54e9fa190351368ea08d02b6b09d32"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> int&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#gad3ec83a8f86764d87676a7a48c837d70">hwloc_cpuset_compare</a> (<a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set1, <a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set2) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Compare CPU sets <code>set1</code> and <code>set2</code> using their highest index CPU.  <a href="group__hwlocality__cpuset.php#gad3ec83a8f86764d87676a7a48c837d70"></a><br/></td></tr>
<tr><td class="memItemLeft" align="right" valign="top"> int&nbsp;</td><td class="memItemRight" valign="bottom"><a class="el" href="group__hwlocality__cpuset.php#ga432291e25ca6e91ab689b08cdc26d3fa">hwloc_cpuset_weight</a> (<a class="el" href="group__hwlocality__cpuset.php#gad2f7833583d020af31e01554251dbe11">hwloc_const_cpuset_t</a> set) </td></tr>
<tr><td class="mdescLeft">&nbsp;</td><td class="mdescRight">Compute the "weight" of CPU set <code>set</code> (i.e., number of CPUs that are in the set).  <a href="group__hwlocality__cpuset.php#ga432291e25ca6e91ab689b08cdc26d3fa"></a><br/></td></tr>
</table>
<hr/><a name="_details"></a><h2>Detailed Description</h2>
<p>The Cpuset API, for use in hwloc itself. </p>
</div>
<?php
include_once("$topdir/includes/footer.inc");