<?

class pin {
    public static $dst;

    public static function os_path_join() {
        $paths = array_filter(func_get_args());
        foreach($paths as $i => $path) {
            $paths[$i] = rtrim($path, '/');
        };
        return join('/', $paths);
    }


    public static function clude($url, $dir = null) {
        try {
            if(!$dir)
                throw new Exception ('Pass a short directory name like "test" '.
                                     'as a second argument');

            if(!self::$dst)
                self::$dst = dirname(__FILE__) . '/libs';

            $target_dir = self::os_path_join(self::$dst, $dir);
            $target_file = self::os_path_join($target_dir, 'pin.php');
            if(file_exists($target_file)) {
                include_once($target_file);
                return;
            }

            self::mkdir(self::$dst);
            self::mkdir($target_dir);
            self::download_lib($url, $target_dir, $target_file);
            include_once($target_file);
        } catch(Exception $e) {
            print htmlspecialchars($e->getMessage());
        }
    }

    private static function download_lib($url, $target_dir, $target_file) {
        $contents = @file_get_contents($url);
        self::save_file($target_file, $contents);
    }

    private static function save_file($target, $txt) {
        @file_put_contents($target, $txt);
        if(!file_exists($target)) {
            throw new Exception ("Can't save file: \"$target\"");
        }
    }

    private static function mkdir($dir) {
        if(file_exists($dir) && is_dir($dir))
            return;

        if(file_exists($dir) && !is_dir($dir))
            throw new Exception ("\"$dir\" exists and is not a directory");

        if(!file_exists($dir)) {
            @mkdir($dir);
            if(!file_exists($dir)) {
                throw new Exception ("Can't create directory: \"$dir\"");
            }
        }
    }

    public static function test() {
        print pin::os_path_join('a','b') == 'a/b' ? '[OK]' : '[FAIL]';
        print pin::os_path_join('a/','b') == 'a/b' ? '[OK]' : '[FAIL]';
    }

}

// pin::clude('https://github.com/yappie/stamp/raw/master/stamps.php', 'stamps');
