<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<div style="margin: 100px;">

    <form role="form" id="urlShortenForm">
        <div class="input-group input-group-lg">
            <input type="text" class="form-control" id="url" placeholder="URL"/>
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-compressed"></span>
                    Shorten
                </button>
            </span>
        </div>
        <input type="text" class="form-control" id="shortUrl" readonly="readonly"/>
    </form>

</div>

<script type="text/javascript">
    $('#urlShortenForm').submit(function(e)
    {
        e.preventDefault();
        
        $.ajax({
            type: "POST",
            url: "site/shortenUrl",
            dataType: "json",
            data: "url="+$('#url').val(),
            success: function(json) {
                $('#shortUrl').val(json.shortUrl);
            }
        });
    });
</script>
