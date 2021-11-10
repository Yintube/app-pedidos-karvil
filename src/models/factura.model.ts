import {Entity, model, property, belongsTo, hasOne} from '@loopback/repository';
import {Cliente} from './cliente.model';
import {Producto} from './producto.model';

@model()
export class Factura extends Entity {
  @property({
    type: 'string',
    id: true,
    generated: true,
  })
  orden_Factura?: string;

  @property({
    type: 'number',
    required: true,
  })
  precio_Factura: number;

  @property({
    type: 'date',
    required: true,
  })
  fecha_Factura: string;

  @property({
    type: 'string',
    required: true,
  })
  id_Producto: string;

  @property({
    type: 'number',
    required: true,
  })
  cantidad_Factura: number;

  @property({
    type: 'number',
    required: true,
  })
  total_Factura: number;

  @property({
    type: 'number',
    required: true,
  })
  estado_Factura: number;

  @belongsTo(() => Cliente, {name: 'Cliente'})
  clienteId: string;

  @hasOne(() => Producto)
  producto: Producto;

  constructor(data?: Partial<Factura>) {
    super(data);
  }
}

export interface FacturaRelations {
  // describe navigational properties here
}

export type FacturaWithRelations = Factura & FacturaRelations;
