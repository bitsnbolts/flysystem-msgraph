<?php

namespace BitsnBolts\Flysystem\Adapter\Plugins;

use League\Flysystem\FilesystemInterface;
use League\Flysystem\PluginInterface;

class InviteUser implements PluginInterface
{
    protected $filesystem;

    public function setFilesystem(FilesystemInterface $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function getMethod()
    {
        return 'inviteUser';
    }

    public function handle($path = null, $username = null)
    {
        $adapter = $this->filesystem->getAdapter();
        if (is_a($adapter, \League\Flysystem\Cached\CachedAdapter::class) && $adapter->getAdapter()) {
            $adapter = $adapter->getAdapter();
        }
        return $adapter->inviteUser($path, $username);
    }
}
