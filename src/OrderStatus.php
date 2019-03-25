<?php
/**
 * This code is licensed under the MIT License.
 *
 * Copyright (c) 2019 Alexey Kopytko <alexey@kopytko.com> and contributors
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

declare(strict_types=1);

namespace CdekSDK\Reference;

final class OrderStatus extends Reference
{
    /**
     * Создан.
     *
     * Заказ зарегистрирован в базе данных СДЭК
     *
     * @var int
     */
    const CREATED = 1;

    /**
     * Удален.
     *
     * Заказ отменен ИМ после регистрации в системе до прихода груза на склад СДЭК в городе-отправителе
     *
     * @var int
     */
    const DELETED = 2;

    /**
     * Принят на склад отправителя.
     *
     * Оформлен приход на склад СДЭК в городе-отправителе.
     *
     * @var int
     */
    const RECEIVED = 3;

    /**
     * Выдан на отправку в городе отправителе.
     *
     * Оформлен расход со склада СДЭК в городе-отправителе. Груз подготовлен к отправке (консолидирован с другими посылками)
     *
     * @var int
     */
    const DELIVERY_SCHEDULED = 6;

    /**
     * Возвращен на склад отправителя.
     *
     * Повторно оформлен приход в городе-отправителе (не удалось передать перевозчику по какой-либо причине).
     *
     * @var int
     */
    const RETURNED = 16;

    /**
     * Сдан перевозчику в городе отправителе.
     *
     * Зарегистрирована отправка в городе-отправителе. Консолидированный груз передан на доставку (в аэропорт/загружен машину)
     *
     * @var int
     */
    const REGISTERED_SENDER_CITY = 7;

    /**
     * Отправлен в городе транзит.
     *
     * Зарегистрирована отправка в город-транзит. Проставлены дата и время отправления у перевозчика
     *
     * @var int
     */
    const TRANSIT_CITY_DISPATCH = 21;

    /**
     * Встречен в городе транзите.
     *
     * Зарегистрирована встреча в городе-транзите
     *
     * @var int
     */
    const TRANSIT_CITY_REGISTERED = 22;

    /**
     * Принят на склад транзита.
     *
     * Оформлен приход в городе-транзите
     *
     * @var int
     */
    const TRANSIT_CITY_RECEIVED = 13;

    /**
     * Возвращен на склад транзита.
     *
     * Повторно оформлен приход в городе-транзите (груз возвращен на склад). Этот статус не означает возврат груза отправителю.
     *
     * @var int
     */
    const TRANSIT_CITY_RETURNED = 17;

    /**
     * Выдан на отправку в городе транзите.
     *
     * Оформлен расход в городе-транзите
     *
     * @var int
     */
    const TRANSIT_CITY_DELIVERY_SCHEDULED = 19;

    /**
     * Сдан перевозчику в городе транзите.
     *
     * Зарегистрирована отправка у перевозчика в городе-транзите
     *
     * @var int
     */
    const TRANSIT_CITY_TRANSPORTED = 20;

    /**
     * Отправлен в городе получатель.
     *
     * Зарегистрирована отправка в город-получатель, груз в пути
     *
     * @var int
     */
    const RECEIVING_CITY_SEND = 8;

    /**
     * Встречен в городе получателе.
     *
     * Зарегистрирована встреча груза в городе-получателе
     *
     * @var int
     */
    const RECEIVING_CITY_REGISTERED = 9;

    /**
     * Принят на склад доставки.
     *
     * Оформлен приход на склад города-получателя, ожидает доставки до двери
     *
     * @var int
     */
    const DELIVERY_WAREHOUSE_REGISTERED = 10;

    /**
     * Принят на склад до востребования.
     *
     * Оформлен приход на склад города-получателя. Доставка до склада, посылка ожидает забора клиентом - покупателем ИМ
     *
     * @var int
     */
    const DELIVERY_WAREHOUSE_STORED = 12;

    /**
     * Выдан на доставку.
     *
     * Добавлен в курьерскую карту, выдан курьеру на доставку
     *
     * @var int
     */
    const DELIVERY_PLANNED = 11;

    /**
     * Возвращен на склад доставки.
     *
     * Оформлен повторный приход на склад в городе-получателе. Этот статус не означает возврат груза отправителю
     *
     * @var int
     */
    const DELIVERY_WAREHOUSE_RETURNED = 18;

    /**
     * Вручен.
     *
     * Успешно доставлен и вручен адресату (конечный статус)
     *
     * @var int
     */
    const DELIVERED = 4;

    /**
     * Не вручен.
     *
     * Покупатель отказался от покупки, возврат в ИМ (конечный статус)
     *
     * @var int
     */
    const NOT_DELIVERED = 5;
}
