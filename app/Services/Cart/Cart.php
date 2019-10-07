<?php


namespace App\Services\Cart;


interface Cart
{
    /**
     * Получение всей корзины.
     * В формате:
     * Product ID => amount
     *
     * @return array
     */
    public function all(): array;

    /**
     * Получение id всех товаров.
     *
     * @return int[]
     */
    public function getProductIds(): array;

    /**
     * Пустая ли корзина.
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Добавление товара в конзину.
     *
     * @param int $productId
     * @param int $amount
     */
    public function put(int $productId, int $amount): void;

    /**
     * Удаление товара из корзины.
     *
     * @param int $productId
     */
    public function remove(int $productId): void;

    /**
     * Проверка наличия товара в корзине.
     *
     * @param int $productId
     * @return bool
     */
    public function contains(int $productId): bool;

    /**
     * Получение количества в корзине.
     *
     * @param int $productId
     * @return int
     */
    public function getAmount(int $productId): int;

    /**
     * Очистить корзину.
     */
    public function clear(): void;

    /**
     * Сохранение корзины в сессию.
     */
    public function save(): void;
}