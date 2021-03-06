<?php defined('SKYBLUE') or die('Bad file request');

/**
* @version        v 1.1 2009-04-19 10:37:00 $
* @package        SkyBlueCanvas
* @copyright      Copyright (C) 2005 - 2010 Scott Edwin Lewis. All rights reserved.
* @license        GNU/GPL, see COPYING.txt
* SkyBlueCanvas is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYING.txt for copyright notices and details.
*/

$data = $this->getData();

?>
<style type="text/css">
    table td img, table td a img {border: none !important;}
    .buttons-top {text-align: right;}
</style>

<div class="jquery_tab">
    <div class="content">
        <h2>
            <a href="admin.php?com=console"><?php __('COM.CONSOLE', 'Dashboard'); ?></a> /
            <a href="admin.php?com=collections"><?php __('COM.COLLECTIONS', 'Collections'); ?></a> / 
            <?php __('COM.META.GROUPS', 'Meta Data Groups'); ?>
        </h2>
        
        <?php echo HtmlUtils::formatMessage($this->getMessage()); ?>
        
        <p class="buttons-top">
            <?php HtmlUtils::mgrActionLink('META.BTN.VIEWITEMS', 'admin.php?com=meta'); ?>  
            <?php HtmlUtils::mgrActionLink('META.BTN.NEWGROUP', 'admin.php?com=meta&action=addgroup'); ?>   
        </p>
        <table id="table_liquid" cellspacing="0">
            <?php 
                HtmlUtils::mgrThead(array(
                    __('GLOBAL.NAME',      'Name', 1),
                    __('GLOBAL.TASKS',     'Tasks', 1)
                )); 
            ?>
            <?php if (!count($data)) : ?>
                <tr>
                    <td colspan="3"><?php __('GLOBAL.NO_ITEMS', 'No items to display'); ?></td>
                </tr>
            <?php else : ?>
                <?php $i=0; ?>
                <?php foreach ($data as $item) : ?>
                <tr class="<?php echo ($i % 2 == 0) ? 'even' : 'odd' ; ?>">
                    <td><?php echo $item->getName(); ?></td>
                    <td width="125">
                        <?php 
                            HtmlUtils::mgrTask(
                                'meta', 
                                'editgroup', 
                                $item->getId(), 
                                $item->getName(), 
                                'pencil',
                                array(
                                    'title'   => __("TASKS.EDIT", 'Edit', 1) . " " . $item->getName()
                                )
                            ); 
                        ?>
                        <?php 
                            HtmlUtils::mgrTask(
                                'meta', 
                                'deletegroup', 
                                $item->getId(), 
                                $item->getName(), 
                                'closethick', 
                                array(
                                    'onclick'=>"confirm_delete(event, '{$item->getName()}', false, 'admin.php?com=meta&action=deletegroup&id={$item->getId()}');",
                                    'title'   => __("TASKS.DELETE", 'Delete', 1) . " " . $item->getName()
                                )
                            ); 
                        ?>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <p class="buttons-bottom">
            <?php HtmlUtils::mgrActionLink('META.BTN.VIEWITEMS', 'admin.php?com=meta'); ?>  
            <?php HtmlUtils::mgrActionLink('META.BTN.NEWGROUP', 'admin.php?com=meta&action=addgroup'); ?>   
        </p>
    </div>
</div>