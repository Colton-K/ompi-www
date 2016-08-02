<?
$subject_val = "Re: [hwloc-devel] Something lighter-weight than XML?";
include("../../include/msg-header.inc");
?>
<!-- received="Sat Sep 24 10:59:07 2011" -->
<!-- isoreceived="20110924145907" -->
<!-- sent="Sat, 24 Sep 2011 10:59:02 -0400" -->
<!-- isosent="20110924145902" -->
<!-- name="Jeff Squyres" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [hwloc-devel] Something lighter-weight than XML?" -->
<!-- id="D3331838-F4E9-49D0-99F9-C9CA0F1CF2B3_at_cisco.com" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="D3565069-3B40-4BFB-BD2D-96A457200E4C_at_cisco.com" -->
<!-- expires="-1" -->
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<p class="headers">
<strong>Subject:</strong> Re: [hwloc-devel] Something lighter-weight than XML?<br>
<strong>From:</strong> Jeff Squyres (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2011-09-24 10:59:02
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="2465.php">Ralph Castain: "Re: [hwloc-devel] Something lighter-weight than XML?"</a>
<li><strong>Previous message:</strong> <a href="2463.php">Ralph Castain: "Re: [hwloc-devel] Some practical hwloc API feedback"</a>
<li><strong>In reply to:</strong> <a href="2428.php">Jeff Squyres: "Re: [hwloc-devel] Something lighter-weight than XML?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="2465.php">Ralph Castain: "Re: [hwloc-devel] Something lighter-weight than XML?"</a>
<li><strong>Reply:</strong> <a href="2465.php">Ralph Castain: "Re: [hwloc-devel] Something lighter-weight than XML?"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Here's some feedback from Ralph -- any idea what's going wrong here?
<br>
<p>-----
<br>
<p>1. I export a topology into xml using
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hwloc_topology_export_xmlbuffer(t, &amp;xmlbuffer, &amp;len);
<br>
<p>I then pack and send the string.
<br>
<p>2. I unpack the string on the other end and import it into a topology
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hwloc_topology_init(&amp;t);
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if (0 != (rc = hwloc_topology_set_xmlbuffer(t, xmlbuffer, strlen(xmlbuffer)))) {
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hwloc_topology_destroy(t);
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;goto cleanup;
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hwloc_topology_load(t);
<br>
<p>3. I then need to compare two topologies, so I export the topology I received into another xml string
<br>
&nbsp;&nbsp;&nbsp;hwloc_topology_export_xmlbuffer(t1, &amp;x1, &amp;l1);
<br>
<p>It is this export that fails, which implies to me that somehow the import didn't work right. Note that this code worked fine with libxml2, so this is a regression.
<br>
<p><p>On Sep 22, 2011, at 9:39 AM, Jeff Squyres wrote:
<br>
<p><span class="quotelev1">&gt; Yes, I can get some testing of the ompi branch pretty quickly.  I can bring in a new copy of this later today and see what we can see.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Many thanks!
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Sep 19, 2011, at 9:05 AM, Brice Goglin wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; I pushed the new minimalistic XML import/export implementation without
</span><br>
<span class="quotelev2">&gt;&gt; libxml2 to the nolibxml branch. If libxml2 is available, it's still used
</span><br>
<span class="quotelev2">&gt;&gt; by default. --disable-libxml2 or some env variables can be used for
</span><br>
<span class="quotelev2">&gt;&gt; force the minimalistic implementation if needed. The minimalistic implem
</span><br>
<span class="quotelev2">&gt;&gt; is only guaranteed to import XML files that were generated by hwloc
</span><br>
<span class="quotelev2">&gt;&gt; (even if libxml was enabled there).
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; I also backported most of this to the new v1.2-ompi branch (required to
</span><br>
<span class="quotelev2">&gt;&gt; backport some other XML cleanups from trunk). This branch will now serve
</span><br>
<span class="quotelev2">&gt;&gt; as a base for Open MPI's embedded hwloc. The idea is to have a complete
</span><br>
<span class="quotelev2">&gt;&gt; v1.2 + nolibxml somewhere so that we can at least run make check (Open
</span><br>
<span class="quotelev2">&gt;&gt; MPI does not embed enough to run hwloc's make check).
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; How do we proceed now? Can we have the OMPI guys test the new code soon?
</span><br>
<span class="quotelev2">&gt;&gt; Should I wait for their feedback before merging the nolibxml branch into
</span><br>
<span class="quotelev2">&gt;&gt; the trunk? I'd like to merge this in v1.3 too (and basically release rc2
</span><br>
<span class="quotelev2">&gt;&gt; as the actual first feature-complete RC), so getting feedback early
</span><br>
<span class="quotelev2">&gt;&gt; might be appreciated.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Brice
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; hwloc-devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; hwloc-devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-devel">http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-devel</a>
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev1">&gt; For corporate legal information go to:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; hwloc-devel mailing list
</span><br>
<span class="quotelev1">&gt; hwloc-devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-devel">http://www.open-mpi.org/mailman/listinfo.cgi/hwloc-devel</a>
</span><br>
<p><p><pre>
-- 
Jeff Squyres
jsquyres_at_[hidden]
For corporate legal information go to:
<a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="2465.php">Ralph Castain: "Re: [hwloc-devel] Something lighter-weight than XML?"</a>
<li><strong>Previous message:</strong> <a href="2463.php">Ralph Castain: "Re: [hwloc-devel] Some practical hwloc API feedback"</a>
<li><strong>In reply to:</strong> <a href="2428.php">Jeff Squyres: "Re: [hwloc-devel] Something lighter-weight than XML?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="2465.php">Ralph Castain: "Re: [hwloc-devel] Something lighter-weight than XML?"</a>
<li><strong>Reply:</strong> <a href="2465.php">Ralph Castain: "Re: [hwloc-devel] Something lighter-weight than XML?"</a>
<!-- reply="end" -->
</ul>
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<!-- trailer="footer" -->
<? include("../../include/msg-footer.inc") ?>