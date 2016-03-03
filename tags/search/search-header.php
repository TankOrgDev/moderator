<div class="container">
<form id="frmSearch" action="<?php echo URL_SEARCH ?>" method="GET">
    <div class="form-group">
      <div class="col-md-offset-1 col-md-3" style="padding:0">
        <select class="form-control" st id="helpType" onchange="onOptionChange(this);">
                        <option value="personal" selected>Help By Meeting Personally</option>
                        <option value="internet">Help Over Internet</option>
                    </select>
      </div>
      <div class="col-md-6" style="padding:0">
          <input class="form-control" id="my-address" autocomplete="off" spellcheck="false" placeholder="I'm looking around..." >
              
          </input>
      </div>
        <div class="col-md-2" style="padding:0">
         <button class="btn btn-primary"  type="submit" value="search"  onClick="doSearch();" >search
                    </button>
                    
    </div>
        <p name="msgtext" id="msgtext" style="text-align:left;margin-top: 10px" value="">
                        </p>
                    <input type="hidden" name="long" value="" />
                    <input type="hidden" name="lat" value="" />
                    <input type="hidden" name="action" id="action" value="get_app" />
    </div>
  </form>
</div>