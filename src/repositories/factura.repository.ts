import {inject, Getter} from '@loopback/core';
import {DefaultCrudRepository, repository, BelongsToAccessor, HasOneRepositoryFactory} from '@loopback/repository';
import {MongodbDataSource} from '../datasources';
import {Factura, FacturaRelations, Cliente, Producto} from '../models';
import {ClienteRepository} from './cliente.repository';
import {ProductoRepository} from './producto.repository';

export class FacturaRepository extends DefaultCrudRepository<
  Factura,
  typeof Factura.prototype.orden_Factura,
  FacturaRelations
> {

  public readonly Cliente: BelongsToAccessor<Cliente, typeof Factura.prototype.orden_Factura>;

  public readonly producto: HasOneRepositoryFactory<Producto, typeof Factura.prototype.orden_Factura>;

  constructor(
    @inject('datasources.mongodb') dataSource: MongodbDataSource, @repository.getter('ClienteRepository') protected clienteRepositoryGetter: Getter<ClienteRepository>, @repository.getter('ProductoRepository') protected productoRepositoryGetter: Getter<ProductoRepository>,
  ) {
    super(Factura, dataSource);
    this.producto = this.createHasOneRepositoryFactoryFor('producto', productoRepositoryGetter);
    this.registerInclusionResolver('producto', this.producto.inclusionResolver);
    this.Cliente = this.createBelongsToAccessorFor('Cliente', clienteRepositoryGetter,);
    this.registerInclusionResolver('Cliente', this.Cliente.inclusionResolver);
  }
}
