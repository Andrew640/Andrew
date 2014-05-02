<?php /* Smarty version Smarty-3.1.16, created on 2014-04-28 14:55:11
         compiled from "/Users/andrew/Sites/iponda.self/skin/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21373012455339dce1d2bf56-09177327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72f6dae63cd3b4072baa09c1a9a1882673a3585a' => 
    array (
      0 => '/Users/andrew/Sites/iponda.self/skin/templates/index.tpl',
      1 => 1398696907,
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
<?php if ($_valid && !is_callable('content_5339dce1df23b2_09601330')) {function content_5339dce1df23b2_09601330($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>

		<link href="/css/date.css" rel="stylesheet" type="text/css"/>

    <title>Twitter search</title>


    </head>


	<body>

		<header class="header">

				<form class="form" action="/" method="post">
					Twitter Search<input class="inputbox" value="<?php echo $_smarty_tpl->tpl_vars['twitterhandle']->value;?>
" name="twitterhandle" type="text" />
				</form>
		</header>

		<div class="extraline"></div>

<!-- <pre><?php echo print_r($_smarty_tpl->tpl_vars['twitterhandle']->value);?>
</pre> -->


    	<div>

    		<?php  $_smarty_tpl->tpl_vars['tweet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tweet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tweets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tweet']->key => $_smarty_tpl->tpl_vars['tweet']->value) {
$_smarty_tpl->tpl_vars['tweet']->_loop = true;
?>
				<div class="line">
    			<span class="by">Tweeted by <?php echo $_smarty_tpl->tpl_vars['tweet']->value['user']['screen_name'];?>
</span> <br />
					<span class="td">Time and Date of Tweet: <?php echo $_smarty_tpl->tpl_vars['tweet']->value['created_at'];?>
</span> <br />
					<span class="twt">Tweet: <?php echo $_smarty_tpl->tpl_vars['tweet']->value['text'];?>
</span>
				</div>

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
