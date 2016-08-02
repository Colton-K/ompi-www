<?
$subject_val = "Re: [OMPI devel] RFC: libevent update";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Mar 18 19:18:54 2008" -->
<!-- isoreceived="20080318231854" -->
<!-- sent="Tue, 18 Mar 2008 19:17:20 -0400" -->
<!-- isosent="20080318231720" -->
<!-- name="Josh Hursey" -->
<!-- email="jjhursey_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] RFC: libevent update" -->
<!-- id="34082414-F897-4BC5-98FC-10C87DE0473C_at_open-mpi.org" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="43CE15B7-5581-40B1-B6F2-83921B315549_at_cisco.com" -->
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
<strong>From:</strong> Josh Hursey (<em>jjhursey_at_[hidden]</em>)<br>
<strong>Date:</strong> 2008-03-18 19:17:20
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="3467.php">George Bosilca: "Re: [OMPI devel] RFC: libevent update"</a>
<li><strong>Previous message:</strong> <a href="3465.php">Roland Dreier: "Re: [OMPI devel] Switching away from SVN?"</a>
<li><strong>In reply to:</strong> <a href="3449.php">Jeff Squyres: "[OMPI devel] RFC: libevent update"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="3467.php">George Bosilca: "Re: [OMPI devel] RFC: libevent update"</a>
<li><strong>Reply:</strong> <a href="3467.php">George Bosilca: "Re: [OMPI devel] RFC: libevent update"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I found another problem with the libevent branch.
<br>
<p>If I set &quot;-mca btl tcp,self&quot; on the command line then I get a segfult  
<br>
when sending messages &gt; 16 KB. I can try to make a smaller repeater,  
<br>
but if you use the &quot;progress&quot; or &quot;simple&quot; tests in ompi-tests below:
<br>
&nbsp;&nbsp;&nbsp;<a href="https://svn.open-mpi.org/svn/ompi-tests/trunk/iu/ft/correctness">https://svn.open-mpi.org/svn/ompi-tests/trunk/iu/ft/correctness</a>
<br>
<p>To build:
<br>
&nbsp;&nbsp;&nbsp;shell$ make
<br>
To run with failure:
<br>
&nbsp;&nbsp;&nbsp;shell$ mpirun  -np 2 -mca btl tcp,self progress  -s 16 -v 1
<br>
To run without failure:
<br>
&nbsp;&nbsp;&nbsp;shell$ mpirun  -np 2 -mca btl tcp,self progress  -s 15 -v 1
<br>
<p>This program will display the message &quot;Checkpoint at any time...&quot;. If  
<br>
you send mpirun SIGUSR2 it will progress to the next stage of the  
<br>
test. The failure occurs when the first message before this becomes  
<br>
an issue though.
<br>
<p>I was using Odin, and if I do not specify the btls then the test will  
<br>
pass as normal.
<br>
<p>The backtrace is below:
<br>
------------------------------------------
<br>
...
<br>
Core was generated by `progress -s 16 -v 1'.
<br>
Program terminated with signal 11, Segmentation fault.
<br>
#0  0x0000002a9793318b in mca_bml_base_free  
<br>
(bml_btl=0x736275705f61636d, des=0x559700) at ../../../../ompi/mca/ 
<br>
bml/bml.h:267
<br>
267         bml_btl-&gt;btl_free( bml_btl-&gt;btl, des );
<br>
(gdb) bt
<br>
#0  0x0000002a9793318b in mca_bml_base_free  
<br>
(bml_btl=0x736275705f61636d, des=0x559700) at ../../../../ompi/mca/ 
<br>
bml/bml.h:267
<br>
#1  0x0000002a9793304d in mca_pml_ob1_put_completion (btl=0x5598c0,  
<br>
ep=0x0, des=0x559700, status=0) at pml_ob1_recvreq.c:190
<br>
#2  0x0000002a97930069 in mca_pml_ob1_recv_frag_callback  
<br>
(btl=0x5598c0, tag=64 '@', des=0x2a989d2b00, cbdata=0x0) at  
<br>
pml_ob1_recvfrag.c:149
<br>
#3  0x0000002a97d5f3e0 in mca_btl_tcp_endpoint_recv_handler (sd=10,  
<br>
flags=2, user=0x5a5df0) at btl_tcp_endpoint.c:696
<br>
#4  0x0000002a95a0ab93 in event_process_active (base=0x508c80) at  
<br>
event.c:591
<br>
#5  0x0000002a95a0af59 in opal_event_base_loop (base=0x508c80,  
<br>
flags=2) at event.c:763
<br>
#6  0x0000002a95a0ad2b in opal_event_loop (flags=2) at event.c:670
<br>
#7  0x0000002a959fadf8 in opal_progress () at runtime/opal_progress.c: 
<br>
169
<br>
#8  0x0000002a9792caae in opal_condition_wait (c=0x2a9587d940,  
<br>
m=0x2a9587d9c0) at ../../../../opal/threads/condition.h:93
<br>
#9  0x0000002a9792c9dd in ompi_request_wait_completion (req=0x5a5380)  
<br>
at ../../../../ompi/request/request.h:381
<br>
#10 0x0000002a9792c920 in mca_pml_ob1_recv (addr=0x5baf70,  
<br>
count=16384, datatype=0x503770, src=1, tag=1001, comm=0x5039a0,  
<br>
status=0x0)
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;at pml_ob1_irecv.c:104
<br>
#11 0x0000002a956f1f00 in PMPI_Recv (buf=0x5baf70, count=16384,  
<br>
type=0x503770, source=1, tag=1001, comm=0x5039a0, status=0x0) at  
<br>
precv.c:75
<br>
#12 0x000000000040211f in exchange_stage1 (ckpt_num=1) at progress.c:414
<br>
#13 0x0000000000401295 in main (argc=5, argv=0x7fbfffe668) at  
<br>
progress.c:131
<br>
(gdb) p bml_btl
<br>
$1 = (mca_bml_base_btl_t *) 0x736275705f61636d
<br>
(gdb) p *bml_btl
<br>
Cannot access memory at address 0x736275705f61636d
<br>
------------------------------------------
<br>
<p>-- Josh
<br>
<p>On Mar 17, 2008, at 2:50 PM, Jeff Squyres wrote:
<br>
<p><span class="quotelev1">&gt; WHAT: Bring new version of libevent to the trunk.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; WHY: Newer version, slightly better performance (lower overheads /
</span><br>
<span class="quotelev1">&gt; lighter weight), properly integrate the use of epoll and other
</span><br>
<span class="quotelev1">&gt; scalable fd monitoring mechanisms.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; WHERE: 98% of the changes are in opal/event; there's a few changes to
</span><br>
<span class="quotelev1">&gt; configury and one change to the orted.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; TIMEOUT: COB, Friday, 21 March 2008
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; DESCRIPTION:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; George/UTK has done the bulk of the work to integrate a new version of
</span><br>
<span class="quotelev1">&gt; libevent on the following tmp branch:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;      <a href="https://svn.open-mpi.org/svn/ompi/tmp-public/libevent-merge">https://svn.open-mpi.org/svn/ompi/tmp-public/libevent-merge</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; ** WE WOULD VERY MUCH APPRECIATE IF PEOPLE COULD MTT TEST THIS BRANCH!
</span><br>
<span class="quotelev1">&gt; **
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Cisco ran MTT on this branch on Friday and everything checked out
</span><br>
<span class="quotelev1">&gt; (i.e., no more failures than on the trunk).  We just made a few more
</span><br>
<span class="quotelev1">&gt; minor changes today and I'm running MTT again now, but I'm not
</span><br>
<span class="quotelev1">&gt; expecting any new failures (MTT will take several hours).  We would
</span><br>
<span class="quotelev1">&gt; like to bring the new libevent in over this upcoming weekend, but
</span><br>
<span class="quotelev1">&gt; would very much appreciate if others could test on their platforms
</span><br>
<span class="quotelev1">&gt; (Cisco tests mainly 64 bit RHEL4U4).  This new libevent *should* be a
</span><br>
<span class="quotelev1">&gt; fairly side-effect free change, but it is possible that since we're
</span><br>
<span class="quotelev1">&gt; now using epoll and other scalable fd monitoring tools, we'll run into
</span><br>
<span class="quotelev1">&gt; some unanticipated issues on some platforms.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Here's a consolidated diff if you want to see the changes:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; <a href="https://svn.open-mpi.org/trac/ompi/changeset?old_path=tmp-public">https://svn.open-mpi.org/trac/ompi/changeset?old_path=tmp-public</a>% 
</span><br>
<span class="quotelev1">&gt; 2Flibevent-merge&amp;old=17846&amp;new_path=trunk&amp;new=17842
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Thanks.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt; Cisco Systems
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="3467.php">George Bosilca: "Re: [OMPI devel] RFC: libevent update"</a>
<li><strong>Previous message:</strong> <a href="3465.php">Roland Dreier: "Re: [OMPI devel] Switching away from SVN?"</a>
<li><strong>In reply to:</strong> <a href="3449.php">Jeff Squyres: "[OMPI devel] RFC: libevent update"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="3467.php">George Bosilca: "Re: [OMPI devel] RFC: libevent update"</a>
<li><strong>Reply:</strong> <a href="3467.php">George Bosilca: "Re: [OMPI devel] RFC: libevent update"</a>
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