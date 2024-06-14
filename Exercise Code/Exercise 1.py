import csv
import numpy as np
from typing import Set, Tuple, List
import torch
import torch.utils
import torch.utils.data
import torch.nn as nn
import torchvision

NoneType = type(None)
import matplotlib.pyplot as plt
from IPython.display import display, clear_output
from PIL import Image
import torchvision.transforms.functional as TF
from torchvision.models import vgg11
from torchvision.models import mobilenet_v2
import torchvision.transforms as transforms
import time

def id_to_fruit(fruit_id: int, fruits: List[str]) -> str:
    if 0 <= fruit_id < len(fruits):
        return fruits[fruit_id]
    else:
        raise RuntimeError(f"Fruit with id {fruit_id} does not exist")
"""
There is a logical error in the id_to_fruit function. 
The function attempts to find the name of a fruit with a specific ID by iterating over the set fruits and using an index idx. 
However, since sets in Python are unordered, 
it is not possible to directly access elements in a set using an index. 
Additionally, the function initializes idx to 0 and increments it by 1 in each iteration, 
which is irrelevant to the "indexing" of elements in a set.
"""

name1 = id_to_fruit(1, ["apple", "orange", "melon", "kiwi", "strawberry"])
name3 = id_to_fruit(3, ["apple", "orange", "melon", "kiwi", "strawberry"])
name4 = id_to_fruit(4, ["apple", "orange", "melon", "kiwi", "strawberry"])

print(name1)
print(name3)
print(name4)
