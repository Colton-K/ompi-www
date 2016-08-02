<?
$subject_val = "Re: [OMPI devel] Add child to another parent.";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Mar 29 07:18:16 2011" -->
<!-- isoreceived="20110329111816" -->
<!-- sent="Tue, 29 Mar 2011 13:18:11 +0200" -->
<!-- isosent="20110329111811" -->
<!-- name="Hugo Meyer" -->
<!-- email="meyer.hugo_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Add child to another parent." -->
<!-- id="AANLkTin6yQ6Jc8K+fy9XmHp_bnWUjv_4oh455YB24Ft-_at_mail.gmail.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="AANLkTi=oo_frQm99nd7S1uH77mCDjLhnuT-HNYBx2Htq_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Add child to another parent.<br>
<strong>From:</strong> Hugo Meyer (<em>meyer.hugo_at_[hidden]</em>)<br>
<strong>Date:</strong> 2011-03-29 07:18:11
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="9145.php">Ralph Castain: "Re: [OMPI devel] Add child to another parent."</a>
<li><strong>Previous message:</strong> <a href="9143.php">Hugo Meyer: "Re: [OMPI devel] Add child to another parent."</a>
<li><strong>In reply to:</strong> <a href="9143.php">Hugo Meyer: "Re: [OMPI devel] Add child to another parent."</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="9145.php">Ralph Castain: "Re: [OMPI devel] Add child to another parent."</a>
<li><strong>Reply:</strong> <a href="9145.php">Ralph Castain: "Re: [OMPI devel] Add child to another parent."</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Ralph.
<br>
<p>I'm having a problem when i try to select the rmaps resilient to be used:
<br>
<p>/home/hmeyer/desarrollo/ompi-code/binarios/bin/mpirun -v -np 4 --hostfile
<br>
../hostfile --bynode -mca rmaps resilient -mca vprotocol receiver -mca plm
<br>
rsh -mca routed cm ./coll 6 10 2&gt;out.txt
<br>
<p><p>I get this as error:
<br>
<p>[clus9:25568] [[53334,0],0] hostfile: checking hostfile ../hostfile for
<br>
nodes
<br>
--------------------------------------------------------------------------
<br>
Your job failed to map. Either no mapper was available, or none
<br>
of the available mappers was able to perform the requested
<br>
mapping operation. This can happen if you request a map type
<br>
(e.g., loadbalance) and the corresponding mapper was not built.
<br>
<p>--------------------------------------------------------------------------
<br>
[clus9:25568] errmgr:hnp:update_state() [[53334,0],0]) ------- App. Process
<br>
state updated for process NULL
<br>
[clus9:25568] [[53334,0],0] errmgr:hnp: job [53334,0] reported state NEVER
<br>
LAUNCHED for proc NULL state UNDEFINED pid 0 exit_code 1
<br>
[clus9:25568] [[53334,0],0] errmgr:hnp: job [53334,0] reported state NEVER
<br>
LAUNCHED
<br>
[clus9:25568] [[53334,0],0] errmgr:hnp: abort called on job [53334,0] with
<br>
status 1
<br>
<p><p>Is there a flag that i'm not turning on? or a component that i should have
<br>
selected?
<br>
<p>Thanks again.
<br>
<p>Hugo Meyer
<br>
<p><p>2011/3/26 Hugo Meyer &lt;meyer.hugo_at_[hidden]&gt;
<br>
<p><span class="quotelev1">&gt; Ok Ralph.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Thanks a lot for your help, i will do as you said and then let you know how
</span><br>
<span class="quotelev1">&gt; it goes.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Best Regards.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Hugo Meyer
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; 2011/3/25 Ralph Castain &lt;rhc_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Mar 25, 2011, at 10:48 AM, Hugo Meyer wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; From what you've described before, I suspect all you'll need to do is add
</span><br>
<span class="quotelev3">&gt;&gt;&gt; some code in orte/mca/odls/base/odls_base_default_fns.c that (a) checks to
</span><br>
<span class="quotelev3">&gt;&gt;&gt; see if a process in the launch message is being relocated (the
</span><br>
<span class="quotelev3">&gt;&gt;&gt; construct_child_list code does that already), and then (b) sends the
</span><br>
<span class="quotelev3">&gt;&gt;&gt; required info to all local child processes so they can take appropriate
</span><br>
<span class="quotelev3">&gt;&gt;&gt; action.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Failure detection, re-launch, etc. have all been taken care of for you.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I looked at the code that you mentioned me and i realize that i have two
</span><br>
<span class="quotelev2">&gt;&gt; possible options, that i'm going to share with you to know your opinion.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; First of all i will let you know my actual situation with the
</span><br>
<span class="quotelev2">&gt;&gt; implementation. As i'm working in a Fault Tolerant system, but using
</span><br>
<span class="quotelev2">&gt;&gt; uncoordinated checkpoint i'm taking checkpoints of all my process at
</span><br>
<span class="quotelev2">&gt;&gt; different time and storing them on the machine where there are residing, but
</span><br>
<span class="quotelev2">&gt;&gt; i also send this checkpoints to another node (lets call it protector), so if
</span><br>
<span class="quotelev2">&gt;&gt; this node fails his process should be restarted in the protector that have
</span><br>
<span class="quotelev2">&gt;&gt; his checkpoints.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Right now i'm detecting the failure of a process and i know where this
</span><br>
<span class="quotelev2">&gt;&gt; process should be restarted, and also i have the checkpoint in the
</span><br>
<span class="quotelev2">&gt;&gt; protector. And i also have the child information of course.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; So, my options are:
</span><br>
<span class="quotelev2">&gt;&gt; *First Option*
</span><br>
<span class="quotelev2">&gt;&gt; *
</span><br>
<span class="quotelev2">&gt;&gt; *
</span><br>
<span class="quotelev2">&gt;&gt; I detect the failure, and then i use
</span><br>
<span class="quotelev2">&gt;&gt; orte_errmgr_hnp_base_global_update_state()  with some modifications and the
</span><br>
<span class="quotelev2">&gt;&gt; hnp_relocate but changing the spawning to make a restart from a checkpoint,
</span><br>
<span class="quotelev2">&gt;&gt; i suposse that using this, the migration of the process to another node will
</span><br>
<span class="quotelev2">&gt;&gt; be updated and everyone will know it, because is the hnp who is going to do
</span><br>
<span class="quotelev2">&gt;&gt; this (is this ok?).
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; This is the option I would use. The other one is much, much more work. In
</span><br>
<span class="quotelev2">&gt;&gt; this option, you only have to:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; (a) modify the mapper so you can specify the location of the proc being
</span><br>
<span class="quotelev2">&gt;&gt; restarted. The resilient mapper module will be handling the restart - if you
</span><br>
<span class="quotelev2">&gt;&gt; look at orte/mca/rmaps/resilient/rmaps_resilient.c, you can see the code
</span><br>
<span class="quotelev2">&gt;&gt; doing the &quot;replacement&quot; and modify accordingly.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; (b) add any required info about your checkpoint to the launch message.
</span><br>
<span class="quotelev2">&gt;&gt; This gets created in orte/mca/odls/base/odls_base_default_fns.c, the
</span><br>
<span class="quotelev2">&gt;&gt; &quot;get_add_procs_data&quot; function (at the top of the file).
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; (c) modify the launch code to handle your checkpoint, if required - see
</span><br>
<span class="quotelev2">&gt;&gt; the file in (b), the &quot;construct_child&quot; and &quot;launch&quot; functions.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; HTH
</span><br>
<span class="quotelev2">&gt;&gt; Ralph
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; *Second Option*
</span><br>
<span class="quotelev2">&gt;&gt; *
</span><br>
<span class="quotelev2">&gt;&gt; *
</span><br>
<span class="quotelev2">&gt;&gt; Modify one of the spawn variations(probably the remote_spawn from rsh) in
</span><br>
<span class="quotelev2">&gt;&gt; the PLM framework and then use the orted_comm to command a remote_spawn in
</span><br>
<span class="quotelev2">&gt;&gt; the protector, but i don't know here how to update the info so everyone
</span><br>
<span class="quotelev2">&gt;&gt; knows about the change or how this is managed.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I might be very wrong in what I said, my apologies if so.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Thanks a lot for all the help.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Best regards.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Hugo Meyer
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-9144/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="9145.php">Ralph Castain: "Re: [OMPI devel] Add child to another parent."</a>
<li><strong>Previous message:</strong> <a href="9143.php">Hugo Meyer: "Re: [OMPI devel] Add child to another parent."</a>
<li><strong>In reply to:</strong> <a href="9143.php">Hugo Meyer: "Re: [OMPI devel] Add child to another parent."</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="9145.php">Ralph Castain: "Re: [OMPI devel] Add child to another parent."</a>
<li><strong>Reply:</strong> <a href="9145.php">Ralph Castain: "Re: [OMPI devel] Add child to another parent."</a>
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