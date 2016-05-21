<script>
	$(function() {
		var keyword = <?=$keyword?> ;
		$( "#cari" ).autocomplete({
			source: keyword
		});
	});
</script>

<div id="pageC">
	<table class="inner">
<tr style="vertical-align:top">
		<td style="background:#fff;padding:0px;"> 
<div class="content-header">
</div>
<div id="contentpane">    
	<form id="mainform" name="mainform" action="" method="post">
    <div class="ui-layout-north panel">
    <h3>Manajemen Kategori Indikator Analisis - <a href="<?=site_url()?>analisis_master/menu/<?=$_SESSION['analisis_master']?>"><?=$analisis_master['nama']?></a></h3>
        <div class="left">
            <div class="uibutton-group">
                <a href="<?=site_url('analisis_kategori/form')?>" class="uibutton tipsy south" title="Tambah Data" target="ajax-modal" rel="window" header="Form Data Kategori Indikator" ><span class="icon-plus-sign icon-large">&nbsp;</span>Tambah kategori Baru</a>
                <button type="button" title="Hapus Data" onclick="deleteAllBox('mainform','<?=site_url("analisis_kategori/delete_all/$p/$o")?>')" class="uibutton tipsy south"><span class="icon-trash icon-large">&nbsp;</span>Hapus Data
            </div>
        </div>
    </div>
    <div class="ui-layout-center" id="maincontent" style="padding: 5px;">
        <div class="table-panel top">
            <div class="left">
            </div>
            <div class="right">
                <input name="cari" id="cari" type="text" class="inputbox help tipped" size="20" value="<?=$cari?>" title="Cari.." onkeypress="if (event.keyCode == 13) {$('#'+'mainform').attr('action','<?=site_url('analisis_kategori/search')?>');$('#'+'mainform').submit();}" />
                <button type="button" onclick="$('#'+'mainform').attr('action','<?=site_url('analisis_kategori/search')?>');$('#'+'mainform').submit();" class="uibutton tipsy south"  title="Cari Data"><span class="icon-search icon-large">&nbsp;</span>Cari</button>
            </div>
        </div>
        <table class="list">
		<thead>
            <tr>
                <th width="10">No</th>
                <th><input type="checkbox" class="checkall"/></th>
                <th width="100">Aksi</th>
				
	 		<? if($o==4): ?>
				<th align="left" width='250'><a href="<?=site_url("analisis_kategori/index/$p/3")?>">kategori<span class="ui-icon ui-icon-triangle-1-n">&nbsp;</span></a></th>
			<? elseif($o==3): ?>
				<th align="left" width='250'><a href="<?=site_url("analisis_kategori/index/$p/4")?>">kategori<span class="ui-icon ui-icon-triangle-1-s">&nbsp;</span></a></th>
			<? else: ?>
				<th align="left" width='250'><a href="<?=site_url("analisis_kategori/index/$p/3")?>">kategori<span class="ui-icon ui-icon-triangle-2-n-s">&nbsp;</span></a></th>
			<? endif; ?>
			
          <th></th>
			</tr>
		</thead>
		<tbody>
        <? foreach($main as $data): ?>
		<tr>
          <td align="center" width="2"><?=$data['no']?></td>
			<td align="center" width="5">
				<input type="checkbox" name="id_cb[]" value="<?=$data['id']?>" />
			</td>
          <td><div class="uibutton-group">
            <a href="<?=site_url("analisis_kategori/form/$p/$o/$data[id]")?>" class="uibutton tipsy south" title="Ubah Data"  target="ajax-modal" rel="window" header="Form Data Kategori Indikator" ><span class="icon-edit icon-large"> Ubah </span></a><a href="<?=site_url("analisis_kategori/delete/$p/$o/$data[id]")?>" class="uibutton tipsy south" title="Hapus Data" target="confirm" message="Apakah Anda Yakin?" header="Hapus Data"><span class="icon-trash icon-large"></span></a>
			</div>
          </td>
          <td><?=$data['kategori']?></td>
          <td></td>
		  </tr>
        <? endforeach; ?>
		</tbody>
        </table>
    </div>
	</form>
    <div class="ui-layout-south panel bottom">
        <div class="left"> 
          <form id="paging" action="<?=site_url('analisis_kategori')?>" method="post">
<a href="<?=site_url()?>analisis_kategori/leave" class="uibutton icon prev">Kembali</a>
		  <label></label>
            <select name="per_page" onchange="$('#paging').submit()" >
              <option value="20" <? selected($per_page,20); ?> >20</option>
              <option value="50" <? selected($per_page,50); ?> >50</option>
              <option value="100" <? selected($per_page,100); ?> >100</option>
            </select>
            <label>Dari</label>
            <label><?=$paging->num_rows?></label>
            <label>Total Data</label>
          </form>
        </div>
        <div class="right">
            <div class="uibutton-group">
            <? if($paging->start_link): ?>
				<a href="<?=site_url("analisis_kategori/index/$paging->start_link/$o")?>" class="uibutton"  >Awal</a>
			<? endif; ?>
			<? if($paging->prev): ?>
				<a href="<?=site_url("analisis_kategori/index/$paging->prev/$o")?>" class="uibutton"  >Prev</a>
			<? endif; ?>
            </div>
            <div class="uibutton-group">
                
				<? for($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
				<a href="<?=site_url("analisis_kategori/index/$i/$o")?>" <? jecho($p,$i,"class='uibutton special'")?> class="uibutton"><?=$i?></a>
				<? endfor; ?>
            </div>
            <div class="uibutton-group">
			<? if($paging->next): ?>
				<a href="<?=site_url("analisis_kategori/index/$paging->next/$o")?>" class="uibutton">Next</a>
			<? endif; ?>
			<? if($paging->end_link): ?>
                <a href="<?=site_url("analisis_kategori/index/$paging->end_link/$o")?>" class="uibutton">Akhir</a>
			<? endif; ?>
            </div>
        </div>
    </div>
</div>
</td></tr></table>
</div>