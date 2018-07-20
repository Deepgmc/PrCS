<div class="row">
	<link rel="stylesheet" href="/css/companies.css">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
	<table class='table'>
		<th>Логотип</th>
		<th>Название</th>
		<th>Инн</th>
		<th>CEO</th>
		<th>Адрес</th>
		<th>Телефон</th>
		<tbody>
		<?php	foreach($companies as $comp){
			$logo_path = '/img/logo/' . $comp->id . '.jpg';
			?>
			<tr class="comp_line-tr" company_id="<?=$comp->id?>" onclick="document.location = '/index.php/company/profile/<?=$comp->id?>'">
				<td class="comp_line-logo">
					<img src="<?=$logo_path?>">
				</td>
				<td class="comp_line-name"><?=$comp->name?></td>
				<td class="comp_line-text"><?=$comp->inn?></td>
				<td class="comp_line-text"><?=$comp->ceo_fio?></td>
				<td class="comp_line-text"><?=$comp->address?></td>
				<td class="comp_line-text comp_line-phone"><?=$comp->phone?></td>
			</tr>
		<?php
		};
		?>
		</tbody>
	</table>
	</div>
	<div class="col-sm-2"></div>
</div>
