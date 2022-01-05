<?php
    $depth = 2;
    $showFile = true;
?>

<div>
    <?php
        for ($i=$depth; $i > 0; $i--) {
            ?>
                <div 
                    style="
                        white-space: nowrap;
                        overflow-x: auto;

                        -ms-overflow-style: none;  /* IE and Edge */
                        scrollbar-width: none;  /* Firefox */
                        
                    "
                >
                    <ul class="nav nav-tabs">
                        <?php
                            $path = str_repeat('../',$i).'.';
                            $dirName = basename(realpath($path));

                            $nextPath = str_repeat('../',$i-1).'.';
                            $nextDirName = basename(realpath($nextPath));

                            foreach (glob($path.'/*') as $tab) {
                                $tab = basename($tab);

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
