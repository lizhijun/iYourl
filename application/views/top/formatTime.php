<!--时间格式化-->
<?php
	function formatTime($timer){
		
		$diff = $_SERVER['REQUEST_TIME'] - $timer;
		$day = floor($diff / 86400);
		$free = $diff % 86400;

		if($day > 0) {
			echo $day." 天前";
		}else{
			if($free>0){
				$hour = floor($free / 3600);
				$free = $free % 3600;
				if($hour>0){
						echo $hour." 小时前";
				}else{
					if($free>0){
						$min = floor($free / 60);
						$free = $free % 60;
						if($min>0){
							echo $min." 分钟前";
						}else{
							if($free>0){
								echo $free." 秒前";
							}else{
								echo ' 刚刚';
							}
						}
					}else{
						echo ' 刚刚';
					}
				}
			}else{
				echo ' 刚刚';
			}
		}
	}
?>