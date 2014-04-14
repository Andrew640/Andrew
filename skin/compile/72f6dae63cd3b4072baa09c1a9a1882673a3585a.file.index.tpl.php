<?php /* Smarty version Smarty-3.1.16, created on 2014-04-13 13:20:51
         compiled from "/Users/andrew/Sites/iponda.self/skin/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21373012455339dce1d2bf56-09177327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72f6dae63cd3b4072baa09c1a9a1882673a3585a' => 
    array (
      0 => '/Users/andrew/Sites/iponda.self/skin/templates/index.tpl',
      1 => 1397394906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21373012455339dce1d2bf56-09177327',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5339dce1df23b2_09601330',
  'variables' => 
  array (
    'twitterhandle' => 0,
    'tweets' => 0,
    'tweet' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5339dce1df23b2_09601330')) {function content_5339dce1df23b2_09601330($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/andrew/Sites/iponda.self/classes/Smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
	<head>

		<link href="/css/date.css" rel="stylesheet" type="text/css"/>

    <title>Start</title>


    </head>

	<body>

			<div>

				<form action="/" method="post">

					Twitterhandle<input value="<?php echo $_smarty_tpl->tpl_vars['twitterhandle']->value;?>
" name="twitterhandle" type="text" />
				</form>

			</div>



    	<div>

    		<?php  $_smarty_tpl->tpl_vars['tweet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tweet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tweets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tweet']->key => $_smarty_tpl->tpl_vars['tweet']->value) {
$_smarty_tpl->tpl_vars['tweet']->_loop = true;
?>

					<span class="date">Source: <?php echo $_smarty_tpl->tpl_vars['tweet']->value['source'];?>
</span> <br />
					<span class="date">Time and Date of Tweet: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['tweet']->value['time']);?>
</span> <br />
    			<span class="date2">Tweeted by <?php echo $_smarty_tpl->tpl_vars['tweet']->value['name'];?>
</span> <br />
					<span class="date3">Tweet: <?php echo $_smarty_tpl->tpl_vars['tweet']->value['tweet'];?>
</span>

    			<br /><br />

    		<?php } ?>

    	</div>
<!--     	<div class="date2">
 -->
<!--     	<?php echo $_smarty_tpl->tpl_vars['items']->value;?>

 -->


<!-- 	<div class="date">Hello</div>
 -->
	</body>
</html>
<?php }} ?>
