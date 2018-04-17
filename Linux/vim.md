#### 分屏功能
```
vim -On file1 file2 //垂直分屏 n是数字，代表分成几屏
vim -on file1 file2 //水平分屏

[Ctrl + w] c //关闭当前窗口
[Ctrl + w] q //关闭最后一个窗口
[Ctrl + w] s //上下分割当前打开的文件
[Ctrl + w] v //水平分割当前打开的文件
[Ctrl + w] l  //移到右边屏
[Ctrl + w] h //移到左边屏
[Ctrl + w] k //移到上边屏
[Ctrl + w] j  //移到下边屏
[Ctrl + w] w //移到下一屏
[Ctrl + w] =  //统一分屏高度
[Ctrl + w] +  //增加分屏高度
[Ctrl + w] -  //减少分屏高度

:sp  filename  //垂直分割打开文件
:vsp  filename  //水平分割打开文件
```

#### shell
```
:!ls -alh
:!mkdir test
```

#### 查找替换
```
:{作用范围}s/{目标}/{替换}/{替换标志}

//当前行
:s/foo/bar/g

//全文
:%s/foo/bar/g

//2-11行
:5,12s/foo/bar/g

//当前行.与接下来两行+2
:.,+2s/foo/bar/g

//空替换标志表示只替换从光标位置开始，目标的第一次出现
:%s/foo/bar

//i表示大小写不敏感查找，I表示大小写敏感
:%s/foo/bar/i

//c表示需要确认，按下y表示替换，n表示不替换，a表示替换所有，q表示退出查找模式， l表示替换当前位置并退出。^E与^Y是光标移动快捷键
:%s/foo/bar/gc

//空字符
:%s/foo//g

//回车
:%s/^\n$//g

```
