<?php

namespace Boangri\Blog\Setup;

use \Magento\Framework\Setup\UpgradeDataInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class UpgradeData
 *
 * @package Boangri\Blog\Setup
 */
class UpgradeData implements UpgradeDataInterface
{

    /**
     * Creates sample blog posts
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (!$context->getVersion()
            || version_compare($context->getVersion(), '0.1.3') < 0
        ) {
            $tableName = $setup->getTable('boangri_blog_post');

            $data = [
                [
                    'title' => 'Post 1 Title',
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eleifend vitae lectus quis dapibus. Etiam interdum sit amet libero vel ullamcorper. Mauris sollicitudin nunc sit amet sem finibus scelerisque. Vivamus eu rutrum odio, et venenatis orci. Proin feugiat ullamcorper mollis. Maecenas eu tristique libero, eget scelerisque arcu. Cras vitae elit nunc. Quisque est eros, faucibus eu euismod non, convallis laoreet massa. Nulla a pulvinar nulla, vitae mattis massa. In pulvinar mi sit amet tortor pretium tempor. Suspendisse nunc eros, finibus at turpis id, aliquet mattis purus. Proin viverra dolor ac rhoncus iaculis.',
                ],
                [
                    'title' => 'Post 2 Title',
                    'content' => 'Nulla aliquet porttitor elementum. Vivamus vitae urna nisi. Maecenas placerat in augue non eleifend. Donec massa lorem, tincidunt id accumsan vitae, viverra eu dolor. Curabitur sit amet facilisis turpis. Sed sodales augue ut malesuada ullamcorper. Nunc eget libero semper, fringilla tortor in, auctor lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc eget malesuada metus, commodo viverra turpis. Quisque eget quam nec elit cursus aliquet ac at leo. Donec diam metus, aliquet quis nulla quis, blandit cursus elit. Praesent blandit bibendum diam eu pulvinar.',
                ],
                [
                    'title' => 'Post 3 Title',
                    'content' => 'Curabitur accumsan mi id venenatis semper. Maecenas pharetra, metus nec lacinia varius, sem nisi semper felis, et porttitor tellus odio sed massa. Morbi sed tellus a augue auctor molestie non sit amet tortor. Donec nisl orci, tincidunt sed vehicula sit amet, sagittis sed nunc. Ut sollicitudin, arcu ut auctor fermentum, ipsum neque vestibulum dui, nec interdum nulla dui sed orci. Duis ornare condimentum condimentum. Donec id tortor quis nisi feugiat rutrum. In sapien tortor, finibus vitae condimentum vel, feugiat a eros. Etiam tristique lobortis eros, eu pretium nulla scelerisque eget. Duis id risus sed elit lacinia tincidunt eget at risus. Phasellus blandit erat non pretium sodales.',
                ],
            ];

            $setup
                ->getConnection()
                ->insertMultiple($tableName, $data);
        }

        $setup->endSetup();
    }
}
