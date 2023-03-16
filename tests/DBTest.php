<?php

declare(strict_types=1);

namespace Fi1a\Unit\DB;

use Fi1a\DB\Adapters\AdapterInterface;
use Fi1a\DB\DB;
use Fi1a\DB\DBInterface;
use Fi1a\DB\Exceptions\ConnectionNotFoundException;
use Fi1a\DB\Facades\DB as DBFacade;
use Fi1a\DB\Facades\Query;
use Fi1a\DB\Facades\Schema;
use Fi1a\DB\Queries\Column;
use Fi1a\DB\Queries\ColumnType;
use Fi1a\MySql\MySqlAdapter;
use PHPUnit\Framework\TestCase;

/**
 * БД
 *
 * @runInSeparateProcess
 */
class DBTest extends TestCase
{
    protected function getDb(): DBInterface
    {
        $db = new DB();

        $db->addConnection(
            new MySqlAdapter(getenv('DB_DSN'), getenv('DB_USERNAME'), getenv('DB_PASSWORD')),
            DBInterface::DEFAULT_CONNECTION
        );

        return $db;
    }

    /**
     * Выполнить запрос
     */
    public function testExec(): void
    {
        $db = new DB();

        $driver = $this->getMockBuilder(MySqlAdapter::class)
            ->setConstructorArgs([getenv('DB_DSN'), getenv('DB_USERNAME'), getenv('DB_PASSWORD')])
            ->onlyMethods(['exec'])
            ->getMock();

        $driver->expects($this->once())->method('exec')->willReturn(true);

        $db->addConnection($driver, DBInterface::DEFAULT_CONNECTION);

        $query = Schema::create()
            ->name('tableName')
            ->column(Column::create()->name('column1'));

        $this->assertTrue($db->exec($query));
    }

    /**
     * Выполнить запрос
     */
    public function testQueryExec(): void
    {
        $driver = $this->getMockBuilder(MySqlAdapter::class)
            ->setConstructorArgs([getenv('DB_DSN'), getenv('DB_USERNAME'), getenv('DB_PASSWORD')])
            ->onlyMethods(['exec'])
            ->getMock();

        $driver->expects($this->once())->method('exec')->willReturn(true);

        DBFacade::addConnection($driver, DBInterface::DEFAULT_CONNECTION);

        $query = Schema::create()
            ->name('tableName')
            ->column(Column::create()->name('column1'));

        $this->assertTrue($query->exec());
    }

    /**
     * Выполнить запрос
     */
    public function testQueryAll(): void
    {
        $driver = $this->getMockBuilder(MySqlAdapter::class)
            ->setConstructorArgs([getenv('DB_DSN'), getenv('DB_USERNAME'), getenv('DB_PASSWORD')])
            ->onlyMethods(['query'])
            ->getMock();

        $driver->expects($this->once())->method('query')->willReturn([['foo' => 'bar']]);

        DBFacade::addConnection($driver, DBInterface::DEFAULT_CONNECTION);

        $query = Query::select()
            ->from('tableName')
            ->column(ColumnType::create()->name('column1'));

        $this->assertEquals([['foo' => 'bar']], $query->all());
    }

    /**
     * Выполнить запрос
     */
    public function testQueryOne(): void
    {
        $driver = $this->getMockBuilder(MySqlAdapter::class)
            ->setConstructorArgs([getenv('DB_DSN'), getenv('DB_USERNAME'), getenv('DB_PASSWORD')])
            ->onlyMethods(['query'])
            ->getMock();

        $driver->expects($this->once())->method('query')->willReturn([['foo' => 'bar']]);

        DBFacade::addConnection($driver, DBInterface::DEFAULT_CONNECTION);

        $query = Query::select()
            ->from('tableName')
            ->column(ColumnType::create()->name('column1'));

        $this->assertEquals(['foo' => 'bar'], $query->one());
    }

    /**
     * Выполнить запрос и вернуть результат
     */
    public function testQuery(): void
    {
        $db = new DB();

        $driver = $this->getMockBuilder(MySqlAdapter::class)
            ->setConstructorArgs([getenv('DB_DSN'), getenv('DB_USERNAME'), getenv('DB_PASSWORD')])
            ->onlyMethods(['query'])
            ->getMock();

        $driver->expects($this->once())->method('query')->willReturn([]);

        $db->addConnection($driver, DBInterface::DEFAULT_CONNECTION);

        $query = Schema::create()
            ->name('tableName')
            ->column(Column::create()->name('column1'));

        $this->assertEquals([], $db->query($query));
    }

    /**
     * Соединения
     */
    public function testConnection(): void
    {
        $db = $this->getDb();
        $this->assertTrue($db->hasConnection('default'));
        $this->assertInstanceOf(AdapterInterface::class, $db->connection('default'));
        $this->assertTrue($db->removeConnection('default'));
        $this->assertFalse($db->removeConnection('default'));
        $this->assertFalse($db->hasConnection('default'));
    }

    /**
     * Исключение при отсутсвии соединения с таким названием
     */
    public function testConnectionNotFound(): void
    {
        $this->expectException(ConnectionNotFoundException::class);
        $db = $this->getDb();
        $db->connection('not-exists');
    }
}
