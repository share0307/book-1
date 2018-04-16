<?php
namespace Mecha\Filesystem;

class MyDirectory
{
    /**
     * 显示目录
     */
    public static function show($dir, $isRecursion = false)
    {

        if(!is_dir($dir)) {
            return [];
        }


        $dirList = scandir($dir);

        //去掉. 和 ..
        array_shift($dirList);
        array_shift($dirList);

        if(!$dirList || !$isRecursion) {
            return $dirList;
        }

        $newDirList = [];

        while(true && $dirList) {

            foreach ($dirList as $dir) {

            }
        }


    }

    /**
     * 创建目录
     */

    /**
     * 删除目录
     */

    /**
     * 改变目录所有者
     */

    /**
     * 改变目录权限
     */

    /**
     *
     */
}