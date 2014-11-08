<?php
namespace Smartdir\Services\Filesystem;

/**
 * Base Filesystem class.
 *
 * Although Laravel can handle the manipulation of files or directories, I prefer to have a service that implements my own functions for dealing with files and directories that abstract out Laravel's implementation
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
}