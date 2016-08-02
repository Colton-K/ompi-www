<?
$subject_val = "Re: [OMPI devel] RFC: libevent update";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Mar 18 16:47:21 2008" -->
<!-- isoreceived="20080318204721" -->
<!-- sent="Tue, 18 Mar 2008 13:47:12 -0700" -->
<!-- isosent="20080318204712" -->
<!-- name="Paul H. Hargrove" -->
<!-- email="PHHargrove_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] RFC: libevent update" -->
<!-- id="47E02A50.4020208_at_lbl.gov" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="Pine.LNX.4.64.0803181528120.16840_at_marvin.we-be-smart.org" -->
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
<strong>Subject:</strong> Re: [OMPI devel] RFC: libevent update<br>
<strong>From:</strong> Paul H. Hargrove (<em>PHHargrove_at_[hidden]</em>)<br>
<strong>Date:</strong> 2008-03-18 16:47:12
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="3462.php">Jeff Squyres: "Re: [OMPI devel] RFC: libevent update"</a>
<li><strong>Previous message:</strong> <a href="3460.php">Brian W. Barrett: "Re: [OMPI devel] RFC: libevent update"</a>
<li><strong>In reply to:</strong> <a href="3460.php">Brian W. Barrett: "Re: [OMPI devel] RFC: libevent update"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="3462.php">Jeff Squyres: "Re: [OMPI devel] RFC: libevent update"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
If avoiding epoll() makes Josh's problems go away, PLEASE let me know
<br>
because that might indicate a deficiency in BLCR that I would want to
<br>
address.
<br>
<p>-Paul
<br>
<p>Brian W. Barrett wrote:
<br>
<span class="quotelev1">&gt; Jeff / George -
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Did you add a way to specify which event modules are used?  Because epoll 
</span><br>
<span class="quotelev1">&gt; pushs the socket list into the kernel, I can see how it would screw up 
</span><br>
<span class="quotelev1">&gt; BLCR.  I bet everything would work if we forced the use of poll / select.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Brian
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Tue, 18 Mar 2008, Jeff Squyres wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Crud, ok.  Keep us posted.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Mar 18, 2008, at 4:16 PM, Josh Hursey wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I'm testing with checkpoint/restart and the new libevent seems to be
</span><br>
<span class="quotelev3">&gt;&gt;&gt; messing up the checkpoints generated by BLCR. I'll be taking a look
</span><br>
<span class="quotelev3">&gt;&gt;&gt; at it over the next couple of days, but just thought I'd let people
</span><br>
<span class="quotelev3">&gt;&gt;&gt; know. Unfortunately I don't have any more details at the moment.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -- Josh
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Mar 17, 2008, at 2:50 PM, Jeff Squyres wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; WHAT: Bring new version of libevent to the trunk.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; WHY: Newer version, slightly better performance (lower overheads /
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; lighter weight), properly integrate the use of epoll and other
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; scalable fd monitoring mechanisms.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; WHERE: 98% of the changes are in opal/event; there's a few changes to
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; configury and one change to the orted.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; TIMEOUT: COB, Friday, 21 March 2008
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; DESCRIPTION:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; George/UTK has done the bulk of the work to integrate a new version
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; of
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; libevent on the following tmp branch:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;     <a href="https://svn.open-mpi.org/svn/ompi/tmp-public/libevent-merge">https://svn.open-mpi.org/svn/ompi/tmp-public/libevent-merge</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; ** WE WOULD VERY MUCH APPRECIATE IF PEOPLE COULD MTT TEST THIS
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; BRANCH!
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; **
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Cisco ran MTT on this branch on Friday and everything checked out
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; (i.e., no more failures than on the trunk).  We just made a few more
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; minor changes today and I'm running MTT again now, but I'm not
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; expecting any new failures (MTT will take several hours).  We would
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; like to bring the new libevent in over this upcoming weekend, but
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; would very much appreciate if others could test on their platforms
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; (Cisco tests mainly 64 bit RHEL4U4).  This new libevent *should* be a
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; fairly side-effect free change, but it is possible that since we're
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; now using epoll and other scalable fd monitoring tools, we'll run
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; into
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; some unanticipated issues on some platforms.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Here's a consolidated diff if you want to see the changes:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="https://svn.open-mpi.org/trac/ompi/changeset?old_path=tmp-public">https://svn.open-mpi.org/trac/ompi/changeset?old_path=tmp-public</a>%
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 2Flibevent-merge&amp;old=17846&amp;new_path=trunk&amp;new=17842
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Thanks.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; --
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Cisco Systems
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<p><p><pre>
-- 
Paul H. Hargrove                          PHHargrove_at_[hidden]
Future Technologies Group
HPC Research Department                   Tel: +1-510-495-2352
Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="3462.php">Jeff Squyres: "Re: [OMPI devel] RFC: libevent update"</a>
<li><strong>Previous message:</strong> <a href="3460.php">Brian W. Barrett: "Re: [OMPI devel] RFC: libevent update"</a>
<li><strong>In reply to:</strong> <a href="3460.php">Brian W. Barrett: "Re: [OMPI devel] RFC: libevent update"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="3462.php">Jeff Squyres: "Re: [OMPI devel] RFC: libevent update"</a>
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