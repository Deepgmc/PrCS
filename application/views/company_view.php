<div class="row">
   <link rel="stylesheet" href="/css/company.css">
   <div class="col-sm-2"></div>
   <div class="col-sm-8">
      <div class="row">&nbsp;</div>
      <div class="row com_info_row">
         <!--company info-->
         <?php
            $logo_path = '/img/logo/' . $company->id . '.jpg';
            // если юзер не залогинен - кнопка редактировать скрывается
            $showClass = $this->session->userdata('isLogined') ? 'show_redact' : '';
         ?>
         <div class="col-sm-2">
            <img src="<?=$logo_path?>">
         </div>
         <div class="col-sm-5">
            <div class="com_info-line">
               <span><?=$company->name?></span>
               <img
                  class="com_info-redactBtn <?=$showClass?>"
                  redact_type="com_name"
                  src="/img/comment.png"
                  title="Оставить комментарий к имени компании" />
            </div>
            <div class="com_info-line">
               <span><?=$company->ceo_fio?></span>
               <img
                  class="com_info-redactBtn <?=$showClass?>"
                  redact_type="ceo"
                  src="/img/comment.png"
                  title="Оставить комментарий к имени руководителя" />
            </div>
            <div class="com_info-line_sm">
               <span><u>Юр. адрес:</u> <?=$company->address?></span>
               <img
                  class="com_info-redactBtn <?=$showClass?>"
                  redact_type="address"
                  src="/img/comment.png"
                  title="Оставить комментарий к адресу компании" />
            </div>
            <div class="com_info-line_sm">
               <span><u>ИНН:</u> <?=$company->inn?></span>
               <img
                  class="com_info-redactBtn <?=$showClass?>"
                  redact_type="inn"
                  src="/img/comment.png"
                  title="Оставить комментарий к ИНН компании"/>
            </div>
            <div class="com_info-line_sm">
               <span><u>Телефон:</u> <?=$company->phone?></span>
               <img
                  class="com_info-redactBtn <?=$showClass?>"
                  redact_type="phone"
                  src="/img/comment.png"
                  title="Оставить комментарий к телефону компании" />
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <p class="info_paragraph"><?=$company->info?></p>
            <img
               class="com_info-redactBtn <?=$showClass?>"
               redact_type="com_global"
               src="/img/comment.png"
               title="Оставить комментарий к компании вцелом" />
         </div>
      </div>
   </div>
   <div class="col-sm-2"></div>

   <!-- окнко комментариев -->

   <div class="com_comment_wnd">
      <div class="com_comment_devider">
         <img src="/img/close.png" />
      </div>
      <div class="com_comment_container">
         <!--main comments container -->
         Комментариев еще нет
      </div>
      <div class="com_comment_devider"></div>
      <div class="container-fluid">
         <div class="row">
            <div class="col-xs-12">
               <textarea class="form-control comments_tarea" id="comment_textarea"></textarea>
            </div>
         </div>
         <div class="row">
            <div class="col-xs-12">
               <button type="button" id="comment_add_button" class="btn btn-primary">Добавить комментарий</button>
            </div>
         </div>
      </div>
   </div>

   <script src="/js/company.js"></script>
</div>
