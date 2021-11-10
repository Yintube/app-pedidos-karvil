import {
  Count,
  CountSchema,
  Filter,
  repository,
  Where,
} from '@loopback/repository';
import {
  del,
  get,
  getModelSchemaRef,
  getWhereSchemaFor,
  param,
  patch,
  post,
  requestBody,
} from '@loopback/rest';
import {
  Factura,
  Producto,
} from '../models';
import {FacturaRepository} from '../repositories';

export class FacturaProductoController {
  constructor(
    @repository(FacturaRepository) protected facturaRepository: FacturaRepository,
  ) { }

  @get('/facturas/{id}/producto', {
    responses: {
      '200': {
        description: 'Factura has one Producto',
        content: {
          'application/json': {
            schema: getModelSchemaRef(Producto),
          },
        },
      },
    },
  })
  async get(
    @param.path.string('id') id: string,
    @param.query.object('filter') filter?: Filter<Producto>,
  ): Promise<Producto> {
    return this.facturaRepository.producto(id).get(filter);
  }

  @post('/facturas/{id}/producto', {
    responses: {
      '200': {
        description: 'Factura model instance',
        content: {'application/json': {schema: getModelSchemaRef(Producto)}},
      },
    },
  })
  async create(
    @param.path.string('id') id: typeof Factura.prototype.orden_Factura,
    @requestBody({
      content: {
        'application/json': {
          schema: getModelSchemaRef(Producto, {
            title: 'NewProductoInFactura',
            exclude: ['id_Producto'],
            optional: ['facturaId']
          }),
        },
      },
    }) producto: Omit<Producto, 'id_Producto'>,
  ): Promise<Producto> {
    return this.facturaRepository.producto(id).create(producto);
  }

  @patch('/facturas/{id}/producto', {
    responses: {
      '200': {
        description: 'Factura.Producto PATCH success count',
        content: {'application/json': {schema: CountSchema}},
      },
    },
  })
  async patch(
    @param.path.string('id') id: string,
    @requestBody({
      content: {
        'application/json': {
          schema: getModelSchemaRef(Producto, {partial: true}),
        },
      },
    })
    producto: Partial<Producto>,
    @param.query.object('where', getWhereSchemaFor(Producto)) where?: Where<Producto>,
  ): Promise<Count> {
    return this.facturaRepository.producto(id).patch(producto, where);
  }

  @del('/facturas/{id}/producto', {
    responses: {
      '200': {
        description: 'Factura.Producto DELETE success count',
        content: {'application/json': {schema: CountSchema}},
      },
    },
  })
  async delete(
    @param.path.string('id') id: string,
    @param.query.object('where', getWhereSchemaFor(Producto)) where?: Where<Producto>,
  ): Promise<Count> {
    return this.facturaRepository.producto(id).delete(where);
  }
}
