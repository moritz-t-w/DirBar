<?php
    /**
     * how many levels should be displayed
     */
    $depth = 2;
    /**
     * whether to display the current file
     */
    $showFile = true;
?>

<div>
    <?php
        for ($i=$depth; $i > 0; $i--) { //for each level
            ?>
                <div 
                    style="
                        white-space: nowrap;
                        overflow-x: auto;
                        
                        /* scrollbar removal */
                        -ms-overflow-style: none;  /* IE and Edge */
                        scrollbar-width: none;  /* Firefox */
                        
                    "
                >
                    <ul class="nav nav-tabs">
                        <?php
                            $path = str_repeat('../',$i).'.'; //path to the parent dir for the current level
                            $dirName = basename(realpath($path));

                            $nextPath = str_repeat('../',$i-1).'.'; //the path that will be active in the DirBar.
                            $nextDirName = basename(realpath($nextPath));

                            foreach (glob($path.'/*') as $tab) { //for each file/dir in the current level dir
                                $tab = basename($tab); //remove the ../

                                $active = false;
                                if($tab == $nextDirName){
                                    $active = true;
                                }

                                ?>
                                    <li
                                        role="presentation"
                                        style="
                                                display: inline-block;
                                                float: none;
                                        "
                                        <?php if($active) echo("class=active") ?>
                                    >
                                        <a href="<?php echo($path.'/'.$tab); ?>"> <?php echo($tab) ?> </a>
                                    </li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
            <?php
        }
    ?>
</div>
