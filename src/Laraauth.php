<?php

namespace NjDigitalLab\Laraauth;

class Laraauth
{
    /**
     * Whether to use our stylesheet or not.
     */
    private static bool $useStylesheet = true;

    /**
     * Allow first and last name.
     */
    private static bool $allowFirstAndLastName = false;

    /**
     * Whether to show a logo or not.
     */
    private static bool $showLogo = false;

    /**
     * The logo path.
     */
    private static ?string $logoPath = null;

    /**
     * The login redirect path.
     */
    private static string $loginRedirectPath = '/';

    /**
     * The login redirect route name.
     */
    private static ?string $loginRedirectRouteName = null;

    /**
     * The register redirect path.
     */
    private static string $registerRedirectPath = '/';

    /**
     * The register redirect route name.
     */
    private static ?string $registerRedirectRouteName = null;

    /**
     * The logout redirect path.
     */
    private static string $logoutRedirectPath = '/';

    /**
     * The logout redirect route name.
     */
    private static ?string $logoutRedirectRouteName = null;

    /**
     * The email verification redirect path.
     */
    private static string $emailVerificationRedirectPath = '/';

    /**
     * The email verification redirect route name.
     */
    private static ?string $emailVerificationRedirectRouteName = null;

    /**
     * The confirm password redirect path.
     */
    private static string $confirmPasswordRedirectPath = '/';

    /**
     * The confirm password redirect route name.
     */
    private static ?string $confirmPasswordRedirectRouteName = null;

    /**
     * The middlewares to apply to the guest route.
     */
    private static array $guestRoutesMiddlewares = ['web', 'guest'];

    /**
     * The middlewares to apply to the auth routes.
     */
    private static array $authRoutesMiddlewares = ['web', 'auth'];

    /**
     * Disable our stylesheet.
     */
    public static function disableStylesheet(): void
    {
        static::$useStylesheet = false;
    }

    /**
     * Check if we should use our stylesheet.
     */
    public static function shouldUseStylesheet(): bool
    {
        return static::$useStylesheet;
    }

    /**
     * Indicate that we should allow first and last name.
     */
    public static function allowFirstAndLastName(): void
    {
        static::$allowFirstAndLastName = true;
    }

    /**
     * Check if we should allow first and last name.
     */
    public static function shouldAllowFirstAndLastName(): bool
    {
        return static::$allowFirstAndLastName;
    }

    /**
     * Indicate that we should show the logo.
     */
    public static function showLogo(string $logoPath): void
    {
        static::$showLogo = true;
        static::$logoPath = $logoPath;
    }

    /**
     * Check whether to show the logo.
     */
    public static function shouldShowLogo(): bool
    {
        return static::$showLogo;
    }

    /**
     * Get the logo path.
     */
    public static function logoPath(): string
    {
        return static::$logoPath;
    }

    /**
     * Set the login redirect path.
     */
    public static function loginRedirectPath(string $path): void
    {
        static::$loginRedirectPath = $path;
    }

    /**
     * Set the login redirect route name.
     */
    public static function loginRedirectRouteName(string $name): void
    {
        static::$loginRedirectRouteName = $name;
    }

    /**
     * Get the login redirect route.
     */
    public static function getLoginRedirectRoute(): ?string
    {
        if (! is_null(static::$loginRedirectRouteName)) {
            return route(static::$loginRedirectRouteName);
        }

        return static::$loginRedirectPath;
    }

    /**
     * Set the register redirect path.
     */
    public static function registerRedirectPath(string $path): void
    {
        static::$registerRedirectPath = $path;
    }

    /**
     * Set the register redirect route name.
     */
    public static function registerRedirectRouteName(string $name): void
    {
        static::$registerRedirectRouteName = $name;
    }

    /**
     * Get the register redirect route.
     */
    public static function getRegisterRedirectRoute(): ?string
    {
        if (! is_null(static::$registerRedirectRouteName)) {
            return route(static::$registerRedirectRouteName);
        }

        return static::$registerRedirectPath;
    }

    /**
     * Set the logout redirect path.
     */
    public static function logoutRedirectPath(string $path): void
    {
        static::$logoutRedirectPath = $path;
    }

    /**
     * Set the logout redirect route name.
     */
    public static function logoutRedirectRouteName(string $name): void
    {
        static::$logoutRedirectRouteName = $name;
    }

    /**
     * Get the logout redirect route.
     */
    public static function getLogoutRedirectRoute(): ?string
    {
        if (! is_null(static::$logoutRedirectRouteName)) {
            return route(static::$logoutRedirectRouteName);
        }

        return static::$logoutRedirectPath;
    }

    /**
     * Set the email verification redirect path.
     */
    public static function emailVerificationRedirectPath(string $path): void
    {
        static::$emailVerificationRedirectPath = $path;
    }

    /**
     * Set the email verification redirect route name.
     */
    public static function emailVerificationRedirectRouteName(string $name): void
    {
        static::$emailVerificationRedirectRouteName = $name;
    }

    /**
     * Get the email verification redirect route name.
     */
    public static function getEmailVerificationRedirectRoute(): ?string
    {
        if (! is_null(static::$emailVerificationRedirectRouteName)) {
            return route(static::$emailVerificationRedirectRouteName);
        }

        return static::$emailVerificationRedirectPath;
    }

    /**
     * Set the confirm password redirect path.
     */
    public static function confirmPasswordRedirectPath(string $path): void
    {
        static::$confirmPasswordRedirectPath = $path;
    }

    /**
     * Set the confirm password redirect route name.
     */
    public static function confirmPasswordRedirectRouteName(string $name): void
    {
        static::$confirmPasswordRedirectRouteName = $name;
    }

    /**
     * Get the confirm password redirect route.
     */
    public static function getConfirmPasswordRedirectRoute(): ?string
    {
        if (! is_null(static::$confirmPasswordRedirectRouteName)) {
            return route(static::$confirmPasswordRedirectRouteName);
        }

        return static::$confirmPasswordRedirectPath;
    }

    /**
     * Set the guest routes middlewares.
     */
    public static function guestRoutesMiddlewares(array $middlewares): void
    {
        static::$guestRoutesMiddlewares = $middlewares;
    }

    /**
     * Set the auth middlewares.
     */
    public static function authRoutesMiddlewares(array $middlewares): void
    {
        static::$authRoutesMiddlewares = $middlewares;
    }

    /**
     * Get the guest routes middlewares.
     */
    public static function getGuestRoutesMiddlewares(): array
    {
        return static::$guestRoutesMiddlewares;
    }

    /**
     * Get the auth routes middlewares.
     */
    public static function getAuthRoutesMiddlewares(): array
    {
        return static::$authRoutesMiddlewares;
    }
}