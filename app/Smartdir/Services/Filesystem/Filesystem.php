<?php
namespace Smartdir\Services\Filesystem;

/**
 * Base Filesystem class.
 *
 * Although Laravel can handle the manipulation of files or directories, I prefer to have a service that implements my own functions for dealing with files and directories that abstract out Laravel's implementation and adds some native PHP functionality to handle things that the Laravel inplementation does not support out of the box
 */
class Filesystem
{

    /**
     * function listFiles
     *
     * @param string $directory            
     * @return array
     */
    public function listFiles($directory)
    {
        // Get all files from a directory
        if (\File::isDirectory($directory)) {
            $files = \File::files($directory);
            // Return the files if any
            if (! empty($files)) {
                return $files;
            } else {
                // Return an empty array
                return array();
            }
        } else {
            return false;
        }
    }

    /**
     * Function listAllFiles
     *
     * @param string $directory            
     * @return array|boolean
     */
    public function listAllFiles($directory)
    {
        // Get all files recursively from a directory
        if (\File::isDirectory($directory)) {
            $allFiles = \File::files($directory);
            // Return the files if any
            if (! empty($allFiles)) {
                return $allFiles;
            } else {
                // Return an empty array
                return array();
            }
        } else {
            return false;
        }
    }

    /**
     * function listSubdirectories
     *
     * @param string $directory            
     * @return boolean
     */
    public function listSubdirectories($directory)
    {
        // Get all subdirectories recursively from a directory
        if (\File::isDirectory($directory)) {
            $allSubdirectories = \File::directories($directory);
            // Return the subdirectories if any
            if (! empty($allSubdirectories)) {
                return $allSubdirectories;
            } else {
                // Return an empty array
                return array();
            }
        } else {
            return false;
        }
    }

    /**
     * function getFileType
     *
     * @param string $file            
     * @return string
     */
    public function getFileType($file)
    {
        // Determine if the supplied path is to a valid file
        if (\File::isFile($file)) {
            // Return the type of the given file
            return \File::type($file);
        } else {
            // The path is not a link to a valid file, so return false
            return false;
        }
    }

    /**
     * Function getFileSize
     *
     * @param string $file            
     * @return boolean
     */
    public function getFileSize($file)
    {
        // Determine if the supplied path is to a valid file
        if (\File::isFile($file)) {
            // Return the size of the given file
            return \File::size($file);
        } else {
            // The path is not a link to a valid file, so return false
            return false;
        }
    }

    /**
     * function formatSizeUnits
     *
     * @param int $bytes            
     * @return string
     */
    public function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }
        
        return $bytes;
    }

    /**
     * function isFile
     *
     * @param string $file            
     * @return boolean
     */
    public function isFile($file)
    {
        // Check if the given path is to a file
        if (\File::isFile($file)) {
            // Return true as the path points to a valid file
            return true;
        } else {
            // Return false as the path is not pointing to a valid file
            return false;
        }
    }

    /**
     * Function openFile
     *
     * @param string $file            
     * @param string $mode            
     * @return boolean
     */
    public function openFile($file, $mode)
    {
        // Check if a valid file and a valid mode is being passed and try to open it with fopen
        if (($file) && (self::isFile($file)) && (isset($mode))) {
            // Try to open the file and return the resource to it
                        return fopen($file, $mode);
        } else {
            // Return false
            return false;
        }
    }
    
}