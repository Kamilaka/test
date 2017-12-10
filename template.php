<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
//echo '<pre>';
//print_r($arParams);
//echo '</pre>';
if (!empty($arResult['ITEMS'])) {
    ?>  

    <div class="col-md-12"> 
        <? if ($arResult["DESCRIPTION"]): ?>
            <?if($arParams["SECTION_DESCRIPTION_VIEW_MODE"] != 'N' && $arParams["SECTION_DESCRIPTION_VIEW_MODE"] == "IN_SIDEBAR"):?>
                <? $this->SetViewTarget('catalog_section_description'); ?>
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="white-row">
                            <aside>
                                <h3 class="page-header nomargin-top"><strong><?= $arResult["NAME"]; ?></strong> </h3>
                                <p><?= $arResult["DESCRIPTION"]; ?></p>
                            </aside>
                        </div>
                    </div>
                </div>
                <? $this->EndViewTarget(); ?>
            <?endif;?>       
        
            <?if($arParams["SECTION_DESCRIPTION_VIEW_MODE"] != 'N' && $arParams["SECTION_DESCRIPTION_VIEW_MODE"] == "IN_CATALOG"):?>
                <div class="row">
                        <div class="col-md-12">                    
                            <div style="background:#0e9932; padding:7px 20px 2px;" class="white-row custom-catalog-white-row">
                                <aside>
                                    <h3 style="color:#fff;border-bottom: none;margin: 10px 0 0;" class="page-header nomargin-top"><strong><?= $arResult["NAME"]; ?></strong> </h3>                                   
                                </aside>
                            </div>
                        </div>
                </div>
            <?endif;?>
         <? endif; ?>
        
        <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
            <?= $arResult["NAV_STRING"] ?><br />
        <? endif; ?>
        <?
        foreach ($arResult['ITEMS'] as $arElement):
            $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CATALOG_ELEMENT_DELETE_CONFIRM')));
            ?>   
            <div style="background:#fff;" class="col-sm-12 col-md-12" id="<?= $this->GetEditAreaId($arElement['ID']); ?>"><!-- item -->
                <div class="item-box custom-item-box" style="border-bottom:1px solid #eee;padding-top:10px; padding-bottom:10px;">
				<div class="col-sm-2 col-md-2">
                    <figure style="height: auto;">
                        <a class="item-hover" href="<?= $arElement["DETAIL_PAGE_URL"] ?>">
                            <span class="overlay color2"></span>
                            <span class="inner">
                                <span class="block fa fa-plus fsize20"></span>
                                <strong><?= GetMessage("MARSD_OPTIMA_DETAIL_PAGE_TITLE"); ?></strong> 
                            </span>
                        </a>                                
                        <? if (is_array($arElement["PREVIEW_PICTURE"])): ?>
                            <img class="img-responsive" src="<?= $arElement["PREVIEW_PICTURE"]["SRC"] ?>" width="<?= $arElement["PREVIEW_PICTURE"]["WIDTH"] ?>" height="<?= $arElement["PREVIEW_PICTURE"]["HEIGHT"] ?>" alt="<?= $arElement["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_ALT"] ?>" title="<?= $arElement["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"] ?>">
                        <? else: ?>
                            <img class="img-responsive" src="<?= $templateFolder ?>/images/no_item_photo.png"  alt="<?= $arElement["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_ALT"] ?>" title="<?= $arElement["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"] ?>">
                        <? endif; ?>
                    </figure>
				</div>
					<div class="col-sm-5 col-md-5">
						<div class="item-box-desc">
							<div style="color:#0e9932; font-size:17px;font-weight:bold;"><?= $arElement["NAME"] ?></div>
							<div style="margin-top:20px;"><?=$arElement["PREVIEW_TEXT"] ?></div>
						</div>
					</div>
					<div class="col-sm-5 col-md-5">
						<div style="border-bottom:1px solid #eee;margin-bottom:10px;padding-right:0;" class="col-sm-12 col-md-12 btn-zakaza-box">
							<div class="col-sm-8 col-md-8">
								<div class="particl"><em>арт.</em> <strong class="particlt"><?=$arElement["PROPERTIES"]["ARTNUMBER"]["VALUE"] ?></strong></div>
								<div class="pwidghts">
									<em class="pwidghtst"><?=$arElement["PROPERTIES"]["WIGHT"]["VALUE"];?></em>
								</div>									
							</div>
							<div style="padding-right:0;" class="col-sm-4 col-md-4">
								<table class="table aka-table-catalog">
									<tr>
										<td><button class="btn btn-default btn-xs btn-minus"><i class="glyphicon glyphicon-minus"></i></button></td>
										<td>
										<input type="text" name="kolichtov" class="aka-form-control" value="0" />
										<input type="hidden" name="tovname" class="aka-form-control-hidden" value="<?= $arElement["NAME"] ?>" />
										</td>
										<td><button class="btn btn-default btn-xs btn-plus"><i class="glyphicon glyphicon-plus"></i></button></td>
									</tr>
								</table>
							</div>
						</div>
						
						<div style="margin-bottom:10px;padding-right:0;" class="col-sm-12 col-md-12 btn-zakaza-box">
							<div class="col-sm-8 col-md-8">
								<div class="particl"><em>арт.</em> <strong class="particlt"><?=$arElement["PROPERTIES"]["ARTNUMBERTO"]["VALUE"] ?></strong></div>
								<div class="pwidghts">
									<em class="pwidghtst"><?=$arElement["PROPERTIES"]["WIGHTTO"]["VALUE"];?></em>
								</div>								
							</div>
							<div style="padding-right:0;" class="col-sm-4 col-md-4">
								<table class="table aka-table-catalog">
									<tr>
										<td><button class="btn btn-default btn-xs btn-minus"><i class="glyphicon glyphicon-minus"></i></button></td>
										<td><input type="text" name="kolichTov" class="aka-form-control" value="0" /></td>
										<td><button class="btn btn-default btn-xs btn-plus"><i class="glyphicon glyphicon-plus"></i></button></td>
									</tr>
								</table>
							</div>
						</div>
						
						
						<div>                                  
							<a style="border:none;float:right;" data-target="#myModalBuy" data-toggle="modal" class="btn custom-buy-btn btn-primary" id="addToCartBtn" onclick="GetInputData()"><i class="fa fa-shopping-cart"></i> Купить</a>
						</div>
					</div>
                </div>
            </div>
        <? endforeach; ?>
        <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
            <?= $arResult["NAV_STRING"] ?>
        <? endif; ?>
    </div>

<? } else{?>
<div class="col-md-12"> 
    <div class="alert alert-danger">
        <?= GetMessage("MARSD_OPTIMA_NO_ITEMS");?>
    </div>
</div>
<? } ?>


<? $this->SetViewTarget('catalog_buy_modal_form'); ?>
<!-- modal dialog -->           
<?
$APPLICATION->IncludeComponent("boxsol:main.order_form", "marsd_optima_buy_modal", array(
    "USE_CAPTCHA" => "Y",
    "OK_TEXT" => $arParams["ORDER_OK_TEXT"],
    "EMAIL_TO" => $arParams["ORDER_EMAIL_TO"],
    "REQUIRED_FIELDS" => $arParams["ORDER_REQUIRED_FIELDS"],
    "EVENT_NAME" => $arParams["ORDER_EMAIL_EVENT_ID"],
        ), false
);
?>           
<!-- end of modal dialog -->
<script>
$(function(){
	$(".btn-minus").click(function(){
		var poleKolich = $(this).parents(".aka-table-catalog").find(".aka-form-control");
		var kolich = parseInt(poleKolich.val());
		if(kolich > 0){
			kolich = kolich - 1;
			poleKolich.val(kolich);
		}
		else{
			poleKolich.val(0);
		}
	});
	
	$(".btn-plus").click(function(){
		var poleKolich = $(this).parents(".aka-table-catalog").find(".aka-form-control");
		var kolich = parseInt(poleKolich.val());
		if(kolich < 99){
			kolich = kolich + 1;
			poleKolich.val(kolich);
		}
		else{
			poleKolich.val(99);
		}
	});
	
	$(".aka-form-control").change(function(){		
		var kolich = parseInt($(this).val());
		if(kolich < 0){			
			$(this).val(0);
		}
		else if (kolich > 99){
			$(this).val(99);
		}	
	});
})

function GetInputData() {
	var zakaz = "";
	$(".aka-form-control").each(function(i){
		if(parseInt($(this).val()) > 0)
		{
			zakaz = zakaz + "\n Артикул " + $(this).parents(".btn-zakaza-box").find(".particlt").text();
			zakaz = zakaz + "\n Вес " + $(this).parents(".btn-zakaza-box").find(".pwidghtst").text();
			zakaz = zakaz + "\n Количество " + parseInt($(this).val()) + "\n" + "\n";			
		}
	});
	if(zakaz.length > 0)
	{
		$("#buy_message").val(zakaz);
	}
}

</script>