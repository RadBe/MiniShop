<?php


namespace App\Services\Cart;


class SessionStorageCart implements Cart
{
    /**
     * @var array
     */
    protected $cart;

    /**
     * Cart constructor.
     */
    public function __construct()
    {
        $this->cart = session('cart', []);
    }

    /**
     * Получение всей корзины.
     *
     * @return array
     */
    public function all(): array
    {
        return $this->cart;
    }

    /**
     * Получение id всех товаров.
     *
     * @return int[]
     */
    public function getProductIds(): array
    {
        return array_keys($this->cart);
    }

    /**
     * Пустая ли корзина.
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->cart);
    }

    /**
     * Проверка наличия товара в корзине.
     *
     * @param int $productId
     * @return bool
     */
    public function contains(int $productId): bool
    {
        return isset($this->cart[$productId]);
    }

    /**
     * Получение количества в корзине.
     *
     * @param int $productId
     * @return int
     */
    public function getAmount(int $productId): int
    {
        return $this->cart[$productId];
    }

    /**
     * Добавление товара в конзину.
     *
     * @param int $productId
     * @param int $amount
     */
    public function put(int $productId, int $amount): void
    {
        $this->cart[$productId] = $amount;
    }

    /**
     * Удаление товара из корзины.
     *
     * @param int $productId
     */
    public function remove(int $productId): void
    {
        if ($this->contains($productId)) {
            unset($this->cart[$productId]);
        }
    }

    /**
     * Очистить корзину.
     */
    public function clear(): void
    {
        $this->cart = [];
    }

    /**
     * Сохранение корзины в сессию.
     */
    public function save(): void
    {
        session()->put('cart', $this->cart);
    }
}