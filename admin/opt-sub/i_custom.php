<?php
@$i_custom_css_head = stripslashes($_POST["i_custom_css_head"]);
@$i_custom_js_footer = stripslashes($_POST["i_custom_js_footer"]);
@$i_custom_html_head = stripslashes($_POST["i_custom_html_head"]);
@$i_custom_html_footer = stripslashes($_POST["i_custom_html_footer"]);
@$i_custom_html_tongji = stripslashes($_POST["i_custom_html_tongji"]);

if(@stripslashes($_POST["i_opt"])){
  update_option("i_custom_css_head",$i_custom_css_head);
  update_option("i_custom_js_footer",$i_custom_js_footer);
  update_option("i_custom_html_head",$i_custom_html_head);
  update_option("i_custom_html_footer",$i_custom_html_footer);
  update_option("i_custom_html_tongji",$i_custom_html_tongji);
}
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/admin/style/i_frame.css">
<?php if(get_option("i_color")){echo "<style>.description-primary{color:".get_option("i_color").";}</style>";}; ?>
<div class="wrap">
  <h1>自定义</h1>
  <form method="post" action="" novalidate="novalidate">
    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row"><label for="i_custom_css_head">自定义CSS代码</label></th>
          <td>
            <fieldset>
              <p>
                <label for="i_custom_css_head">位于&lt;/head&gt;之前，直接写样式代码，不用添加&lt;style&gt;标签。</label>
              </p>
              <p>
                <textarea name="i_custom_css_head" value="" rows="10" cols="50" id="i_custom_css_head" class="large-text code"><?php echo get_option("i_custom_css_head"); ?></textarea>
              </p>
            </fieldset>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="i_custom_js_footer">自定义javascript代码</label></th>
          <td>
            <fieldset>
              <p>
                <label for="i_custom_js_footer">位于底部，直接填写JS代码，不需要添加&lt;script&gt;标签。</label>
              </p>
              <p>
                <textarea name="i_custom_js_footer" rows="10" cols="50" id="i_custom_js_footer" class="large-text code"><?php echo get_option("i_custom_js_footer"); ?></textarea>
              </p>
            </fieldset>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="i_custom_html_head">自定义头部HTML代码</label></th>
          <td>
            <fieldset>
              <p>
                <label for="i_custom_html_head">位于&lt;/head&gt;之前，这部分代码是在主要内容显示之前加载，通常是CSS样式、自定义的&lt;meta&gt;标签、全站头部JS等需要提前加载的代码，需填HTML标签。</label>
              </p>
              <p>
                <textarea name="i_custom_html_head" rows="10" cols="50" id="i_custom_html_head" class="large-text code"><?php echo get_option("i_custom_html_head"); ?></textarea>
              </p>
            </fieldset>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="i_custom_html_footer">自定义底部HTML代码</label></th>
          <td>
            <fieldset>
              <p>
                <label for="i_custom_html_footer">位于&lt;/body&gt;之前，这部分代码是在主要内容加载完毕加载，通常是JS代码，需填HTML标签。</label>
              </p>
              <p>
                <textarea name="i_custom_html_footer" rows="10" cols="50" id="i_custom_html_footer" class="large-text code"><?php echo get_option("i_custom_html_footer"); ?></textarea>
              </p>
            </fieldset>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="i_custom_html_tongji">网站统计HTML代码</label></th>
          <td>
            <fieldset>
              <p>
                <label for="i_custom_html_tongji">位于底部，用于添加第三方流量数据统计代码，如：Google analytics、百度统计、CNZZ、51la，国内站点推荐使用百度统计，国外站点推荐使用Google analytics。需填HTML标签，如果是javascript代码，请保存在自定义javascript代码。</label>
              </p>
              <p>
                <textarea name="i_custom_html_tongji" rows="10" cols="50" id="i_custom_html_tongji" class="large-text code"><?php echo get_option("i_custom_html_tongji"); ?></textarea>
              </p>
            </fieldset>
          </td>
        </tr>
      </tbody>
    </table>
    <p class="submit">
        <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
    </p>
  </form>
</div>