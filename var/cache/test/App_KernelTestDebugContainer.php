<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerGJDEIbr\App_KernelTestDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerGJDEIbr/App_KernelTestDebugContainer.php') {
    touch(__DIR__.'/ContainerGJDEIbr.legacy');

    return;
}

if (!\class_exists(App_KernelTestDebugContainer::class, false)) {
    \class_alias(\ContainerGJDEIbr\App_KernelTestDebugContainer::class, App_KernelTestDebugContainer::class, false);
}

return new \ContainerGJDEIbr\App_KernelTestDebugContainer([
    'container.build_hash' => 'GJDEIbr',
    'container.build_id' => '7a4320e7',
    'container.build_time' => 1724758812,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerGJDEIbr');
